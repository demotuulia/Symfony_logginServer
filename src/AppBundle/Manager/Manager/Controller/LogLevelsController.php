<?php
/**
 * A manager class of the controller
 * AppBundle\Controller\FrontEnd\LogLevelsController
 *
 */

namespace AppBundle\Manager\Manager\Controller;

use AppBundle\Manager\Manager\ControllerManager;
use AppBundle\Manager\Manager\Entity\LogsLevels;
use AppBundle\Manager\Manager\Form;
use AppBundle\Manager\Manager\Bootstrap;

final class LogLevelsController extends ControllerManager
{

    /**
     * getList
     *
     * @return array
     */
    public function getList()
    {
        return $this->getContainer()
            ->get('AppBundle.LogsLevelsManager')
            ->getAllLevels();
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


            $logsLevelManager = $this->getContainer()->get('AppBundle.LogsLevelsManager');

            $returnArr = [
                'errors' => $logsLevelManager->validate($formParams)
            ];


            if (empty($returnArr['errors'])) {
                $id = $logsLevelManager->save($formParams);
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
     * @param $id
     * @return Symfony\Component\Form\FormView
     */
    public function getEditForm($id) {
        // Wee need to initialize the form types before using them
        Form::setFormTypes();

        //  make object for existing item or create new object.
        $logsLevelManager = $this->getContainer()->get('AppBundle.LogsLevelsManager');
        $logLevel  =  $logsLevelManager->get($id);

        $formParams = $this->getPostParams([]);

        // Replcae the posted form field values to $logLevel, if they are defined
        array_walk(
            $logLevel,
            function(&$field, $key, $formParams){
                $field = isset($formParams[$key]) ? $formParams[$key] : $field;
            },
            $formParams
        );


        $function = $logsLevelManager->defineFormPostFunction($logLevel);


        $formFields = [
            'name' => [
                'label' => 'Name',
                'key' => 'name',
                'value' => $logLevel['name'],
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

        if ($function == LogsLevels::$FORM_FUNCTION_UPDATE) {
            $formFields['id'] =   [
                'label' => 'id',
                'key' => 'id',
                'value' => $logLevel['id'] ,
                'type' => Form::$HIDDEN
            ];
        }

        // Id in the html tag <form>
        $formId = 'editLogLevel';

        return $this->getContainer()
            ->get('AppBundle.FormManager')
            ->get( $formFields, ['id' => $formId]);
    }

}