<?php
/**
 * List controller
 */
namespace AppBundle\Controller\FrontEnd;

use AppBundle\Manager\Manager\FrontEndPaging;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Controller\FrontEndBaseController;
use AppBundle\Manager\Manager\Bootstrap;

use Symfony\Component\HttpFoundation\Response;


class LogsListController extends FrontEndBaseController {

  

  

    /**
     * listAction
     *
     * @Route("/list/", name="list")
     */
    public function listAction(Request $request)
    {
  
        $listController = $this->get('AppBundle.LogsListControllerManager');
        $frontEndPagingManager = $this->get('AppBundle.FrontEndPagingManager');
        
        $filterForm = $listController->getSearchForm();
        $listHeaderItems = $listController->getHeaderItems();
      
        //
        // Get log records
        //
        $logManager = $this->get('AppBundle.LogsManager');
        $sort = [$frontEndPagingManager->getSortFromQueryString()];
        $page = $frontEndPagingManager->getCurrentPage();
        $filters = $listController->getSearchFilters();


        $result = $listController->getLogsList($filters, $sort, $page);

        if (!$page) {
           $this->renderToExcel($result->list, $request);
        }
        
        //
        // Create paging select and button links and page select menu
        //
        $pagingLinks = $frontEndPagingManager->getPagingLinks($result->totalPages);
     

        $templateVars = array_merge(
            [
                'totalPages' => $result->totalPages ,
                'totalRecords' => $result->totalRecords,
                'list' => $result->list ,
                'listHeaderItems' => $listHeaderItems,
                'pagingLinks' =>  $pagingLinks,
                'filterForm' => $filterForm,
                'listTableTypeClass' => Bootstrap::$TABLE_TYPE_BASIC,
                'filterFormClass' => Bootstrap::$FORM_INLINE,
                'pagingForm' => $frontEndPagingManager->getPaginationForm($result->totalPages),
                'pagingFormClass' => Bootstrap::$FORM_INLINE,
            ],
            $this->getCommonTemplateVariables()
        );

        //
        // Render
        //
        return $this->render('frontEnd/list.html.twig', $templateVars);
    }


    /**
     * Render list to Excel
     *
     * @param array                                     $list
     * @param Symfony\Component\HttpFoundation\Request $request
     */
    private function renderToExcel($list, $request) {
        $listController = $this->get('AppBundle.LogsListControllerManager');
        $listController->prepareExcel($list, $request);
        $response = new Response();
        $response->headers->set('Content-Type', 'application/vnd.ms-excel');
        $response->headers->set('Content-Disposition', 'attachment;filename="logListExport.xls"');
        $response->headers->set('Cache-Control', 'max-age=0');
        $response->prepare($request);
        $response->sendHeaders();
        $listController->renderExcel();
        exit();
    }





}