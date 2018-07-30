<?php
/**
 * A manager class of the controller
 * AppBundle\Controller\FrontEnd\LogsListController
 *
 */

namespace AppBundle\Manager\Manager\Controller;

use AppBundle\Manager\Manager\ControllerManager;
use AppBundle\Manager\Manager\Form;
use AppBundle\Manager\Manager\Bootstrap;

final class LoginController extends ControllerManager {


    /**
     * getForm
     *
     * @return Symfony\Component\Form\FormView
     */
    public function getForm() {

        $this->getContainer()
            ->get('AppBundle.FormManager')
            ->setFormTypes();


        $fields = [
            '_username' => [
                'label' => 'Username',
                'key' => '_username',
                'type' => FORM::$TEXT,
                'value' => $this->getLastUserName(),
            ],
            '_password' => [
                'label' => 'Password',
                'key' => '_password',
                'type' => FORM::$PASSWORD
            ],
            '_target_path' => [
                'label' => ' ',
                'key' => '_target_path',
                'value' => 'list',
                'type' => FORM::$HIDDEN
            ],
            'submit' => [
                'label' => 'Login',
                'key' => 'search',
                'default' => '0',
                'type' => FORM::$SUBMIT ,
                'value' => '',
                'attr' => ['class' => Bootstrap::$FORM_BUTTON_STANDARD]
            ],

        ];

        $formManager = $this->getContainer()
            ->get('AppBundle.FormManager');
        
        $options = ['method' => 'POST', 'id' => 'loginForm'];
        $form = $formManager->get($fields, $options);

        return $form;
    }


    /**
     * Get last username
     * 
     * @return string
     */
    public function getLastUserName() {
        return  $this->getContainer()
            ->get('security.authentication_utils')
            ->getLastUsername();
    }


    /**
     * getLoginError
     *
     * @return mixed
     */
    public function getLoginError()  {
       return $this->getContainer()
           ->get('security.authentication_utils')
           ->getLastAuthenticationError();
    }
}