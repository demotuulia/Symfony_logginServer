<?php
/**
 * Base controller of all front end controllers
 */
namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;


abstract class FrontEndBaseController extends Controller {


    /**
     * Get common template variables for all controllers
     * 
     * @return array
     */
    protected function getCommonTemplateVariables(){
        
            return [
                'mainNavigation' => $this->get('AppBundle.MenuManager')->getMainNavigation(),
                'currentUserName' => $this->get('AppBundle.UserManager')->getCurrentUser()->username
            ];
    }

    

}