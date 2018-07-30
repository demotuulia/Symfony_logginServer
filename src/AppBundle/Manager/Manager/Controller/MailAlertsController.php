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
use Doctrine\ORM\Tools\Pagination\Paginator;
use AppBundle\Manager\Manager\Bootstrap;

final class MailAlertsController extends ControllerManager {


    /**
     * getList
     *
     * @param bool $userId
     * @return mixed
     */
    public function getList($userId = false) {

        if (!$userId) {
            $userId = $this->getUserId();
        }

        $filters = [
            [
                'field' => 'MA.appUserId',
                'operator' => '=',
                'value' => $userId ,
            ]
        ];
        
        return $this->getContainer()
            ->get('AppBundle.MailAlert')
            ->getListByUserId($filters);
    }


    /**
     * @param $mailAlertId
     * @return mixed
     */
    public function getEditForm($mailAlertId) {
        // Wee need to initialize the form types before using them
        Form::setFormTypes();

        $function = ($mailAlertId == 'new') ? 'insert' : 'update';
        //  make object for existing item or create new object.
        $mailAlertManager = $this->getMailAlertManager([], $mailAlertId);
        $alert  =  $mailAlertManager->getCurrentAlert();

        // Define active. For new iten it is dedined true.
        $active = ($function == 'insert') ? true :  $alert['active'] == 1 ;
        //
        // Add fields
        //
        $formFields = [

            'appUserId' => [
                'label' => 'usd',
                'key' => 'appUserId',
                'value' => $this->getUserId() ,
                'type' => Form::$HIDDEN
            ],
            'active' => [
                'label' => 'Active',
                'key' => 'active',
                'value' => $active,
                'type' => Form::$CHECKBOX, 
                'required' => false
            ]
        ];

        if ($function == 'update') {
            $formFields['mailAlertId'] = [
                'label' => '',
                'key' => 'mailAlertId',
                'value' => $mailAlertId ,
                'type' => Form::$HIDDEN
            ];
        }

        // Add filter fields
        array_walk($alert['filters'],
            function ($filter) use (&$formFields) {

                $options = $this->getContainer()->get('AppBundle.MailAlertFilter')->getFilterOptions($filter['filterField']);
                $formFields[$filter['filterField'] ] = [
                    'key' =>  $filter['filterField'],
                    'value' => $filter['value'] ,
                    'type' => Form::$SELECT,
                    'options' => $options,
                    'attr' => ['class' => 'col-xs-2']
                ];
            }
        );

        $formFields['submit'] = [
            'label' => 'Save',
            'key' => 'save',
            'type' => Form::$SUBMIT ,
            'value' => '',
            'attr' => ['class' => Bootstrap::$FORM_BUTTON_STANDARD]
       ];

        return $this->getContainer()
            ->get('AppBundle.FormManager')
            ->get( $formFields, ['id' => 'editMailAlert']);
    }


    /**
     * Get id of the current user
     *
     * @return  integer
     */
    private function getUserId() {
        return  $this->getContainer()
            ->get('AppBundle.UserManager')
            ->getCurrentUser()
            ->id;
    }

    /**
     * Get posted form params
     *
     * @param array $formParams     Optional form params (used for unit  testing)
     * @param int $mailAlertId      If given the database is read by this id instaed of the form
     *                              If these are not given (normal case) the form is read from the query string
     * @return array
     */
    private function getMailAlertManager($formParams = [], $mailAlertId = false) {

        $postedForm = $this->getPostParams($formParams);

        $mailAlertManager =  $this->getContainer()->get('AppBundle.MailAlert');
        if($this->isFormPosted($formParams)) {
            $postedForm['active'] = (int)isset($postedForm['active']);
        }


        if ($mailAlertId) {
            $postedForm['mailAlertId'] = $mailAlertId;

        }


        //  make object for existing item or create new object.
        if(isset($postedForm['mailAlertId'])) {
            if ($postedForm['mailAlertId'] != 'new') {
                $mailAlertManager->set('id', $postedForm['mailAlertId']);
            } else {
                $mailAlertManager->create();
            }
        } else {
            $mailAlertManager->create();
        }


        array_walk(
            $postedForm,
            function($field, $key) use ($mailAlertManager) {
                $mailAlertManager->set($key, $field);
            }
        );

        return $mailAlertManager ;
    }



    /**
     * postForm
     *
     * Post form, if it has been submited.
     *
     * If 'mailAlertId' is defined in post fields this is 'update'.
     * Others this is 'insert'
     *
     * @param array $formParams     Optional form params (used for unit  testing)
     *                              If these are not given (normal case) the form is read from the query string
     * @return array|bool           If there is an insert or update return the id of the new or updated item and form
     *                              vaildation errors.
     */
    public function postForm($formParams = []) {

        if ($this->isFormPosted($formParams)) {
            $mailAlertManager = $this->getMailAlertManager($formParams);
            $returnArr = [];
            $errors = $mailAlertManager->validateAlert();

            if (empty($errors)) {
                $id = $mailAlertManager->saveAlert();
                $returnArr['id'] = $id;
                $returnArr['saved'] = true;
            } else {
                $returnArr['errors'] = $errors;
            }
            return $returnArr;
        }
        return false;
    }


    /**
     * Delete given alert
     *
     * @param  integer $alertId   mail_alert.mail_alert_id 
     */
    public function delete($alertId) {

        $mailAlertManager =  $this->getContainer()->get('AppBundle.MailAlert');
        $mailAlertManagerFilter =  $this->getContainer()->get('AppBundle.MailAlertFilter');
        
        // delete from table mail_alert
        $mailAlertManager->delete($alertId);
        $filters = $mailAlertManagerFilter->find($alertId, 'mailAlertId');
        
        // delete filters from table mail_alert_filter
        array_walk(
            $filters,
            function ($filter) use ($mailAlertManagerFilter) {
                $id = $filter->get('mailAlertFilterId');
                $mailAlertManagerFilter->delete($id);
            }
        );
    }

}