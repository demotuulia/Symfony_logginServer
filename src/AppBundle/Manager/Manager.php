<?php
/**
 * A base class for all manager classes in folder AppBundle\Manager\Manager
 * 
 * All manager classes should inherit from this class.
 * Only classes which are used as members of this class
 * are exception.
 */
namespace AppBundle\Manager;

abstract class Manager {


    /**
     * @var Doctrine\ORM\EntityManager
     */
    protected $em;

    /**
     * @var AppBundle\Manager\MonoLog
     */
    private $monologManager;

    /**
     * @var AppBundle\Manager\HttpExceptionManager
     */
    private $exceptionManager;


    /**
     *  Service container
     *
     * @var ContainerBuilder
     */
    private $container;

    /**
     * setManagerParams
     * 
     * Set member variables of this class with injection
     *
     * @param Doctrine\ORM\EntityManager                $em
     * @param AppBundle\Manager\MonoLog                 $monologManager
     * @param AppBundle\Manager\HttpExceptionManager    $exceptionManager
     * @param  ContainerBuilder                         $container
     */
    public function setManagerParams($em, $monologManager, $exceptionManager, $container)
    {
        $this->monologManager = $monologManager;
        $this->exceptionManager = $exceptionManager;
        $this->em = $em;
        $this->container = $container;

    }


    /**
     * log to file
     *
     * @param string $message
     * @param string $type
     */
    protected function log($message , $type = 'debug') {
        $this->monologManager->log($message, $type);
    }


    /**
     * Throw exception
     *
     *
     * @param integer $number
     * @param string $message
     */
    protected function throwException($number, $message = '') {
        $this->exceptionManager->throwException($number, $message );
    }

    /**
     * getChildClassName
     *
     * @return string
     */
    protected function getChildClassName() {
        $childClassName =  get_class($this);
        $childClassName = explode('\\', $childClassName);
        $childClassName = end($childClassName );
        return $childClassName;
    }



    /**
     * getContainer
     *
     * @return ContainerBuilder
     */
    protected function getContainer() {
        return $this->container;
    }
    
    
    
    /**
     * Get the current request object
     *
     *
     * @return Symfony\Component\HttpFoundation\Request
     */
    protected function getRequest() {
        
        $request = $this->getContainer()->get('request_stack')->getCurrentRequest();
        return $request;
    }


    /**
     * getQueryStringParams from the url
     *
     *
     * @return array
     */
    protected function getQueryStringParams() {
        
        return $this->getRequest()->query->all();
    }


    /**
     * Get the base link of the current page
     *
     *
     * @return string
     */
    protected function getBaseLink() {
        return $this->getRequest()->server->get('REDIRECT_URL');
    }
}