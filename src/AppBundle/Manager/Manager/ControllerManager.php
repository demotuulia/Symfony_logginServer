<?php
/**
 * A base class for all manager controller  classes.
 * All these classes should be in the folder AppBundle\Manager\Manager\Controller
 *
 */
namespace AppBundle\Manager\Manager;

use AppBundle\Manager\Manager;


abstract class ControllerManager extends Manager {




    /**
     * Read post params from the query string
     *
     * A function to help to save a from
     *
     * @param array $formParams     Optional form params (used for unit  testing)
     * @return array
     */
    protected function getPostParams($formParams = []) {
        return  !empty($formParams) ? $formParams : $this->getQueryStringParams();
    }


    /**
     * isFormPosted
     *
     * A function to help to save a from
     * 
     * @param array $formParams     Optional form params (used for unit  testing)
     * @return bool
     */
    protected function isFormPosted($formParams = []) {
        $postedForm = $this->getPostParams($formParams);
        return isset($postedForm['submit']);
    }


}