<?php
/**
 * A class to manage an item list with paging and sort 
 * 
 * 
 * This class includes the functions to get variables for
 * the paging templates :
 *
 *      app/Resources/views/frontEnd/partials/paging.html.twig
 *      app/Resources/views/frontEnd/partials/listTable.html.twig
 * 
 * 
 * 
 *
 */
namespace AppBundle\Manager\Manager;

use AppBundle\Manager\Manager;

class FrontEndPaging extends Manager {
    
    /**
     * Constant to recognize next page
     *
     * @var int
     */
    public static $NEXT_PAGE = 1;

    
    /**
     * Constant to recognize previous page
     *
     * @var int
     */
    public static $PREVIOUS_PAGE = -1;


    /**
     * Page used for Excel export
     * 
     * @var int
     */
    public static $EXCEL = 0;
    

    /**
     * Get current page by reading it from the url
     * 
     * page is defined with variable: page
     * 
     * @return int
     */
    public function getCurrentPage() {
        
        $queryStringParams = $this->getQueryStringParams();
        return isset($queryStringParams['page']) ? $queryStringParams['page'] : 1;
    }


    /**
     * Get the sort from query string
     * 
     *  This is defined as: 
     *    ?sort=SORT_FIELD&sortDir=SORT_DIR
     *
     *  Where :
     *  sort        The field to dort
     *  sortDir     DESC or ASC
     * 
     * 
     * @return array
     */
    public function getSortFromQueryString()  {
        
        $queryStringParams = $this->getQueryStringParams();
        $sort = isset($queryStringParams['sort']) && isset($queryStringParams['sortDir'])
            ? [ 
                'field' => $queryStringParams['sort'], 
                'dir' => $queryStringParams['sortDir']  
            ]
            : [];

        return  $sort;
    }


    /**
     * Create table header items sort links
     * 
     * In template:
     * 
     * app/Resources/views/frontEnd/partials/listTable.html.twig
     * 
     * @param array $listHeaderItems
     */
    public function createHeaderItemSortLinks(&$listHeaderItems) {

        $baseLink = $this->getBaseLink();
        $sort = $this->getSortFromQueryString();
        $queryStringParams = $this->getQueryStringParams();
        $queryStringParams['page'] = 1;
        
        // Create sort links
        foreach ($listHeaderItems as &$item) {
            if (isset($item['sortItem'])) {
                $sortDir = 'DESC';
                if (!empty($sort)) {
                    if ($sort['field'] == $item['sortItem'] &&  $sort['dir'] == 'DESC') {
                        $sortDir = 'ASC';
                    }
                }
                $queryStringParams['sort'] = $item['sortItem'];
                $queryStringParams['sortDir'] = $sortDir;
                $item['sortLink'] = $baseLink . '?' . http_build_query($queryStringParams);
            }
        }
    }


    /**
     * @param $totalPages
     * @return array
     */
    public function getPagingLinks($totalPages) {
        return [
            'next' => $this->getPagingLink( $totalPages , self::$NEXT_PAGE),
            'previous' => $this->getPagingLink( $totalPages , self::$PREVIOUS_PAGE),
            'excel' => $this->getPagingLink( $totalPages , self::$EXCEL),
            'pageSelect' => $this->getPageSelect($totalPages)
        ];
    }

    
    /**
     * Get base paging link to next or prev page
     *
     * @param integer $totalPages
     * @param integer $dir           self::$NEXT_PAGE or self::$PREVIOUS_PAGE
     * @return bool|string
     */
    public function getPagingLink( $totalPages, $dir) {
        
        $baseLink = $this->getBaseLink();
        $page = $this->getCurrentPage();
        $queryStringParams = $this->getQueryStringParams();
        
        if ($page >= $totalPages && $dir == self::$NEXT_PAGE) {
            return false;
        }

        if ($page <= 1 && $dir == self::$PREVIOUS_PAGE) {
            return false;
        }

        
        $queryStringParams['page'] = ($dir) ? $page + $dir : self::$EXCEL;
        
        $pagingLink = $baseLink . '?' . http_build_query($queryStringParams);

        return $pagingLink;
    }


    /**
     * Get items for the  page select menu items as array and the Javascript redirect link after a change in the menu
     *
     *
     * @param $totalPages
     * @return array
     */
    public function getPageSelect($totalPages) {

        $baseLink = $this->getBaseLink();
        $queryStringParams = $this->getQueryStringParams();

        $onChangeLink = $baseLink . '?' . http_build_query($queryStringParams);

        return  $onChangeLink;
    }



    /**
     * getPaginationForm
     *
     * @param int $totalPages
     * @return Symfony\Component\Form\FormView
     */
    public function getPaginationForm($totalPages) {

        $FormFields = [];

        if ($this->getCurrentPage() > 1) {
            $FormFields['prevPage'] = [
                'label' => '<<',
                'key' => 'prevPage',
                'value' => $this->getCurrentPage(),
                'type' => Form::$SUBMIT,
                'attr' => ['class' => Bootstrap::$FORM_BUTTON_STANDARD]
            ];
        }


        $FormFields['PagingSelect'] = [
                'label' => ' ',
                'key' => 'PagingSelect',
                'value' => $this->getCurrentPage(),
                'type' => Form::$SELECT,

        ];


        $FormFields['PagingSelect']['options'] = $this->getPageSelectOptions($totalPages);


        if ($this->getCurrentPage() < $totalPages) {
            $FormFields['nextPage'] = [
                'label' => '>>',
                'key' => 'nextPage',
                'value' => $this->getCurrentPage(),
                'type' => Form::$SUBMIT,
                'attr' => ['class' => Bootstrap::$FORM_BUTTON_STANDARD]
            ];
        }

        return $this->getContainer()
            ->get('AppBundle.FormManager')
            ->get( $FormFields);
    }


    /**
     * getPageSelectOptions
     *
     * @param $totalPages
     * @return array
     */
    private function getPageSelectOptions($totalPages){
        $options =[];
        for($index = 1; $index <= $totalPages; $index++) {
            $options[] = ['name' => $index . ' ', 'value' => $index ];
        }
        return $options;
    }
}