<?php
/**
 * A manager class of the controller 
 * AppBundle\Controller\FrontEnd\LogsListController
 * 
 */

namespace AppBundle\Manager\Manager\Controller;

use AppBundle\Manager\Manager\EntityManager;
use AppBundle\Manager\Manager\ControllerManager;
use AppBundle\Manager\Manager\Form;
use AppBundle\Manager\Manager\Entity\Logs;
use AppBundle\Manager\Manager\Bootstrap;
use AppBundle\Manager\Manager\Excel;

final class LogsListController extends ControllerManager {
    
    /**
     *  Header items in the log table
     *  
     * The sort items refer to tanble 'Logs'  (L) and 'ClientSystems' ('S')
     * 
     * @var array 
     */
     private $listHeaderItems = [
            ['label' => 'Id' ],
            ['label' => 'Date', 'sortItem' => 'L.timestamp'],
            ['label' => 'System', 'sortItem' => 'S.name' ],
            ['label' => 'Type', 'sortItem' => 'L.type' ],
            ['label' => 'Level', 'sortItem' => 'L.level' ],
            ['label' => 'Message' ],
        ];
    
     
    /**
     * Form values posted  by the user in the search form
     * 
     * @var array
     */
    private $searchFormValues = [];


    /**
      * Get header Items of the Logs list  table
      * 
      * Create header items and sort links
      * 
      * @return array
      */
    public function getHeaderItems() {
        $frontEndPagingManager = $this->getContainer()->get('AppBundle.FrontEndPagingManager');
        $listHeaderItems = $this->listHeaderItems;
        $frontEndPagingManager->createHeaderItemSortLinks($listHeaderItems);
        return $listHeaderItems;
    }
    
        
        
    /**
     * define FilterFormFieldValues
     *
     * @return array
     */
    private function getPostedSearchFormValues() {
        
        // Wee need to initialize the form types before using them
        Form::setFormTypes();
      
        $queryString = $this->getQueryStringParams();
        
        //
        // Set form fields 
        //
        $searchFormValues = [
             'startDate' => [
                 'label' => 'Start Date',
                'key' => 'startDate',
                'default' => date('Y-m-d', strtotime("-30 days")) ,
                'type' => Form::$TEXT
                ],
            'endDate' => [
                'label' => 'End Date',
                'key' => 'endDate',
                'default' =>  date('Y-d-m', time()) ,
                'type' =>  Form::$TEXT
                ],
            'systemId' =>  [
                'label' => ' System',
                'key' => 'systemId',
                'default' => 0,
                'type' => Form::$SELECT
                ],
            'type' =>  [
                'label' => ' Type',
                'key' => 'type',
                'default' => 0,
                'type' => Form::$SELECT
            ],
            'level' =>  [
                'label' => ' Level',
                'key' => 'level',
                'default' => 0,
                'type' => Form::$SELECT
            ],
            'submit' =>  [
                    'label' => 'Search',
                    'key' => 'search',
                    'default' => '0',
                    'type' => Form::$SUBMIT, 
                    'attr' => ['class' => Bootstrap::$FORM_BUTTON_STANDARD]
                ]
                
        ];
      
        // set form values as posted value or as default valued
        array_walk(
            $searchFormValues, 
            function(&$filter, $key , $queryString) {
                $filter['value'] = isset($queryString[$key])
                    ? $queryString[$key] : $filter['default'];
            } ,
            $queryString
        ); 
          
        //
        //Options for system menu select
        //
        $selectFields = [
            (object)['field' =>'systemId', 'manager' => 'AppBundle.ClientSystemsManager' ],
            (object)['field' =>'type', 'manager' => 'AppBundle.LogsTypesManager' ],
            (object)['field' =>'level', 'manager' => 'AppBundle.LogslevelsManager' ]
        ]  ;
        foreach ($selectFields as $selectField) {
            $searchFormValues[$selectField->field]['options'] = $this->getContainer()
                ->get($selectField->manager)
                ->getMenu();
        }
        $systemManager = $this->getContainer()->get('AppBundle.ClientSystemsManager');
         
        $searchFormValues['systemId']['options'] = $this->getContainer()
            ->get('AppBundle.ClientSystemsManager')
            ->getMenu();
       
        $this->searchFormValues = $searchFormValues;
    }


    /**
     * Get filters for the search query from the form
     *
     * These filters are used in the search query
     * 
     *
     * @return array
     */
    public function getSearchFilters() {
        if (empty($this->searchFormValues)) {
            $this->getPostedSearchFormValues();
        }

        $fields = [
            (object)['name' => 'startDate',    'operator'=> '>=',   'dbField' => logs::$TIMESTAMP_FILTER_FIELD],
            (object)['name' => 'endDate',      'operator'=> '<=',    'dbField' => logs::$TIMESTAMP_FILTER_FIELD],
            (object)['name' => 'systemId',     'operator'=> '=',    'dbField' => logs::$SYSTEM_FILTER_FIELD],
            (object)['name' => 'type',         'operator'=> '=',    'dbField' => logs::$TYPE_FILTER_FIELD],
            (object)['name' => 'level',        'operator'=> '=',    'dbField' => logs::$LEVEL_FILTER_FIELD],
        ];

        $filters = [];
        foreach ($fields as $field) {
            if ($this->searchFormValues[$field->name]['value']  ) {
                $value = $this->searchFormValues[$field->name]['value'];
                // If end date add the complete day for the filter by defining the hours
                if ($field->name == 'endDate') {
                    $value .= ' 23:59:59';
                }

                $filters[] = [
                    'field' => $field->dbField,
                    'operator' => $field->operator,
                    'value' => $value
                ];
            }
        }

        return $filters;
    }



    /**
     * Get search form
     * 
     * @return Symfony\Component\Form\FormView
     */
    public function getSearchForm(){
        if (empty($this->searchFormValues)) {
            $this->getPostedSearchFormValues();
        }
        
        return $this->getContainer()
                ->get('AppBundle.FormManager')
                ->get( $this->searchFormValues);
    }


    public function getLogsList($filters, $sort, $page) {
        $list = $this->getContainer()->get('AppBundle.LogsManager')->getLogsList($filters, $sort, $page);
        return $list;
    }

    
    /**
     * Export to excel
     * 
     * @param array $list
     */
    public function prepareExcel($list, $request) {

        $excelManager = $this->getContainer()->get('AppBundle.ExcelManager');
        $title = 'Logs ' . date('Y-m-D');
        $sheets = [
            [
                'title' => $title,
                'headers' =>  [
                    'name' => 'System',
                    'level' => 'Level',
                    'type' => 'Type',
                    'message' => 'Message'
                ],
                'rows' => $list
            ]
        ];
       
        $excelManager->prepare($title, $sheets );
    }


    /**
     * renderExcel
     * 
     * 
     */
    public function renderExcel() {
        $excelManager = $this->getContainer()->get('AppBundle.ExcelManager');
        $excelManager->render();
    }
    
    
}