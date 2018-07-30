<?php
/**
 *  A service class to manage table logs_levels
 * 
 */
namespace AppBundle\Manager\Manager\Entity;

use AppBundle\Manager\Manager\EntityManager;
use AppBundle\Manager\HttpExceptionManager;

final class LogsLevels extends EntityManager{


    /**
     * Variable of the function defineFormPostFunction
     *
     * @var string
     */
    public static $FORM_FUNCTION_INSERT = 'insert';


    /**
     * Variable of the function defineFormPostFunction
     *
     * @var string
     */
    public static $FORM_FUNCTION_UPDATE = 'update';

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


    /**
     * get All Levels
     *
     * @return array
     */
    public function getAllLevels() {
        $all =   $this->em
            ->getRepository($this->getRepositoryName())
            ->findAll();
        $all = $this->toArray($all);
        return $all;
    }

    /**
     * Get a system or create a new empty system object
     *
     * @param $id
     * @return array
     */
    public function get($id) {
        return (is_numeric($id))
            ? current($this->find($id))->toArray() : $this->getDatabaseEntity()->toArray();
    }


    /**
     * Define from the post data if the save function is insert or update
     *
     * If the dat has valid (numeric) systemId the function is update
     *
     * @param $data
     * @return string
     */
    public function defineFormPostFunction($data) {

        if (isset($data['id'])) {
            if (is_numeric($data['id'])) {
                return self::$FORM_FUNCTION_UPDATE;
            }
        }
        return self::$FORM_FUNCTION_INSERT;
    }


}