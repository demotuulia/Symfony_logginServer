<?php

namespace AppBundle\Controller\FrontEnd;

use AppBundle\Manager\Manager\Bootstrap;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Controller\FrontEndBaseController;

class LogsLevelsController extends FrontEndBaseController
{
    /**
     *  Mail Alert List Action
     *
     * @Route("/logslevels/", name="logslevels")
     */
    public function  systemsListAction(Request $request)
    {
        $templateVars = array_merge(
            [
                'list' => $this->get('AppBundle.LogLevelsControllerManager')->getList(),
                'tableTypeClass' => Bootstrap::$TABLE_TYPE_STRIPED
            ],
            $this->getCommonTemplateVariables()
        );

        return $this->render('frontEnd/logsList.html.twig', $templateVars);
    }


    /**
     * editSystemAction
     *
     * @Route("/editLogLevel/{id}", name="editLogLevel")
     */
    public function editSystemAction($id)
    {
        $systemsControllerManager =  $this->get('AppBundle.LogLevelsControllerManager');

        $result  = $systemsControllerManager->postForm();

        if (isset($result['saved'])) {
            return $this->redirectToRoute('logslevels');
        }

        $templateVars = array_merge(
            [
                'errors' => isset($result['errors']) ? $result['errors'] : [],
                'form' => $systemsControllerManager->getEditForm($id),
                'formClass' => Bootstrap::$FORM_FIELD_STANDARD
            ],
            $this->getCommonTemplateVariables()
        );
        return $this->render('frontEnd/editsystem.html.twig', $templateVars);
    }



    /**
     *  deletLogLevelAction
     *
     * @Route("/deleteLogLevel/{id}", name="deleteLogLevel")
     */
    public function deletLogLevelAction($id)
    {
        $systemsControllerManager =  $this->get('AppBundle.LogsLevelsManager');
        $systemsControllerManager ->delete($id);
        return $this->redirectToRoute('logslevels');
    }



}
