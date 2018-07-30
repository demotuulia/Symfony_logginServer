<?php

namespace AppBundle\Controller\FrontEnd;

use AppBundle\Manager\Manager\Bootstrap;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Controller\FrontEndBaseController;

class MailAlertsController extends FrontEndBaseController
{
    /**
     *  Mail Alert List Action
     *
     * @Route("/mailalerts/", name="mailalerts")
     */
    public function mailAlertListAction(Request $request)
    {
        $list = $this->get('AppBundle.MailAlertsController')->getList();

        $templateVars = array_merge(
            [
                'list' => $list->list,
                'tableTypeClass' => Bootstrap::$TABLE_TYPE_STRIPED
            ],
            $this->getCommonTemplateVariables()
        );
        // replace this example code with whatever you need
        return $this->render('frontEnd/mailAlertList.html.twig', $templateVars);
    }


    /**
     * Edit Mail Alert Action
     *
     * @Route("/editmailalert/{mailAlertId}", name="editmailalert")
     */
    public function editMailAlertAction($mailAlertId)
    {
        $mailAlertsControllerManager =  $this->get('AppBundle.MailAlertsController');
     
        $result  = $mailAlertsControllerManager->postForm();

        if (isset($result['saved'])) {
           return $this->redirectToRoute('mailalerts');
        }
        
        $templateVars = array_merge(
            [
                'errors' => isset($result['errors']) ? $result['errors'] : [],
                'form' => $mailAlertsControllerManager->getEditForm($mailAlertId),
                'formClass' => Bootstrap::$FORM_FIELD_STANDARD
            ],
            $this->getCommonTemplateVariables()
        );
        return $this->render('frontEnd/editmMailAlert.html.twig', $templateVars);
    }

    /**
     * Edit Mail Alert Action
     *
     * @Route("/deletemailalert/{mailAlertId}", name="deletemailalert")
     */
    public function deleteMailAlertAction($mailAlertId)
    {
        $mailAlertsControllerManager =  $this->get('AppBundle.MailAlertsController');
        $mailAlertsControllerManager ->delete($mailAlertId);
        return $this->redirectToRoute('mailalerts');
    }


   

}
