<?php
/**
 * A manager class of the controller
 * AppBundle\Controller\FrontEnd\SystemController
 *
 */

namespace AppBundle\Manager\Manager\Controller;

use AppBundle\Manager\Manager\EntityManager;
use AppBundle\Manager\Manager\ControllerManager;
use AppBundle\Manager\Manager\Form;
use AppBundle\Manager\Manager\Bootstrap;
use AppBundle\Manager\Manager\Entity\ClientSystems;

final class SystemsController extends ControllerManager {

    /**
     * getList
     *
     * @return array
     */
    public function getList() {

        return $this->getContainer()
            ->get('AppBundle.ClientSystemsManager')
            ->getAllSystems();
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


            $systemsManager = $this->getContainer()->get('AppBundle.ClientSystemsManager');

            $returnArr = [
                'errors' => $systemsManager->validate($formParams)
            ];


            if (empty($returnArr['errors'])) {
                $id = $systemsManager->save($formParams);
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
     * @param $systemid
     * @return Symfony\Component\Form\FormView
     */
    public function getEditForm($systemid) {
        // Wee need to initialize the form types before using them
        Form::setFormTypes();

        //  make object for existing item or create new object.
        $systemsManager = $this->getContainer()->get('AppBundle.ClientSystemsManager');
        $system  =  $systemsManager->get($systemid);

        $formParams = $this->getPostParams([]);

        // Replcae the posted form field values to $system, if they are defined
        array_walk(
            $system,
            function(&$field, $key, $formParams){
                $field = isset($formParams[$key]) ? $formParams[$key] : $field;
            },
            $formParams
        );


        $function = $systemsManager->defineFormPostFunction($system);
        

        $formFields = [
            'name' => [
                'label' => 'Name',
                'key' => 'name',
                'value' => $system['name'],
                'type' => Form::$TEXT
            ],
            'apikey' => [
                'label' => 'Apikey',
                'key' => 'apikey',
                'value' => $system['apikey'],
                'type' => Form::$TEXT,
            ],

            'pubkey' => [
                'label' => 'Pubkey',
                'key' => 'pubkey',
                'value' => $system['pubkey'],
                'type' => Form::$TEXT
            ],


            'submit'=> [
                'label' => 'Save',
                'key' => 'save',
                'type' => Form::$SUBMIT ,
                'value' => '',
                'attr' => ['class' => Bootstrap::$FORM_BUTTON_STANDARD]
            ]
        ];

        if ($function == ClientSystems::$FORM_FUNCTION_UPDATE) {
            $formFields['systemid'] =   [
                'label' => 'systemid',
                'key' => 'systemid',
                'value' => $system['systemid'] ,
                'type' => Form::$HIDDEN
            ];
        }

        // Id in the html tag <form>
        $formId = 'editSystem';

        return $this->getContainer()
            ->get('AppBundle.FormManager')
            ->get( $formFields, ['id' => $formId]);
    }



    /**
     * Delete given system
     *
     * @param  integer $systemId
     */
    public function delete($systemId) {
        $mailAlertManager =  $this->getContainer()->get('AppBundle.SystemManager');
        $mailAlertManager->delete($systemId);
    }

}