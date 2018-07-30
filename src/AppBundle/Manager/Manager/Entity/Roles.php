<?php
/**
 *  A service class to manage table logs_levels
 * 
 */
namespace AppBundle\Manager\Manager\Entity;

use AppBundle\Manager\Manager\EntityManager;
use AppBundle\Manager\HttpExceptionManager;

final class Roles extends EntityManager{

    /**
     * Get systems menu
     *
     * This menu can be used in class and function:
     * AppBundle\Manager\Manager\Form::get()
     *
     * @param string $labelField
     * @return array
     */
    public function getMenu($labelField = 'name') {
        return parent::getMenu($labelField);
    }
}