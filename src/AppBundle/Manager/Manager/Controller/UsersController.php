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
use AppBundle\Manager\Manager\Bootstrap;
use AppBundle\Manager\Manager\Entity\User;

final class UsersController extends ControllerManager {

    /**
     * getList
     *
     * @return array
     */
    public function getList() {

        return $this->getContainer()
            ->get('AppBundle.UserManager')
            ->getAllUsers();
    }


    /**
     * postForm
     *
     * Post form, if it has been submitted.
     *
     *
     * @param array $formParams     Optional form params (used for unit  testing)
     *                              If these are not given (normal case) the form is read from the query string
     * @return array|bool           If there is an insert or update return the id of the new or updated item and form
     *                              validation errors.
     */
    public function postForm($formParams = []) {

        if ($this->isFormPosted($formParams)) {
          if (empty($formParams)) {
              $formParams = $this->getPostParams($formParams);
          }
            $usersManager = $this->getContainer()->get('AppBundle.UserManager');
            
            $returnArr = [
                'errors' => $usersManager->validate($formParams)
            ];

            if (empty($returnArr['errors'])) {
                $id = $usersManager->save($formParams);
                $returnArr['id'] = $id;
                $returnArr['saved'] = true;
            }
            return $returnArr;
        }
        return false;
    }

    
    /**
     * getEditForm
     *
     *
     * @param $userid
     * @return Symfony\Component\Form\FormView
     */
    public function getEditForm($userid) {
        // Wee need to initialize the form types before using them
        Form::setFormTypes();

        //  make object for existing item or create new object.
        $usersManager = $this->getContainer()->get('AppBundle.UserManager');
        $user  =  $usersManager->get($userid);

        $formParams = $this->getPostParams([]);

        // Replcae the posted form field values to $user, if they are defined
        array_walk(
            $user,
            function(&$field, $key, $formParams){
                $field = isset($formParams[$key]) ? $formParams[$key] : $field;
            },
            $formParams
        );


        $function = $usersManager->defineFormPostFunction($user);
        $active = ($function == User::$FORM_FUNCTION_INSERT)
            ? true :  $user['isActive'] == 1 ;

        $formFields = [
            'isActive' => [
                'label' => 'Active',
                'key' => 'isActive',
                'value' => $active,
                'type' => Form::$CHECKBOX
            ],
            'username' => [
                'label' => 'Username',
                'key' => 'username',
                'value' => $user['username'],
                'type' => Form::$TEXT,
            ],
            'password' => [
                'label' => 'Password',
                'key' => 'password',
                'value' => '',
                'type' => Form::$PASSWORD
            ],
            'email' => [
                'label' => 'Email',
                'key' => 'email',
                'value' => $user['email'],
                'type' => Form::$TEXT
            ],

            'role' => [
                'label' => 'Role',
                'key' => 'role',
                'value' => $user['role'],
                'type' => Form::$SELECT,
                'options' =>  $this->getContainer()->get('AppBundle.RolesManager')->getMenu()
            ],
            'submit'=> [
                'label' => 'Save',
                'key' => 'save',
                'type' => Form::$SUBMIT ,
                'value' => '',
                'attr' => ['class' => Bootstrap::$FORM_BUTTON_STANDARD]
            ]
        ];

        if ($function == user::$FORM_FUNCTION_UPDATE) {
            $formFields['id'] =   [
                'label' => '',
                'key' => 'id',
                'value' => $user['id'] ,
                'type' => Form::$HIDDEN
            ];
        }

        // Id in the html tag <form>
        $formId = 'editUser';

        return $this->getContainer()
            ->get('AppBundle.FormManager')
            ->get( $formFields, ['id' => $formId]);
    }


    /**
     * Delete given user
     *
     * @param  integer $userId
     */
    public function delete($userId) {
        $mailAlertManager =  $this->getContainer()->get('AppBundle.UserManager');
        $mailAlertManager->delete($userId);
    }

}