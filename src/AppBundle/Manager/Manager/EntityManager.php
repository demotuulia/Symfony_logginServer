<?php
/**
 * This a Symfony manager class as an abstract base class for all of the
 * business rules of database tables.
 * Symfony has an entity class for each table for the database transactions.
 * This is a manger class used as an extension for the Symfony entitty classes.
 * 
 * This class includes functions and properties,which must be included in every 
 * entitty class to manage the business rules.
 *
 */
namespace AppBundle\Manager\Manager;

use AppBundle\Manager\Manager;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\Tools\Pagination\Paginator;

abstract class EntityManager extends Manager {
    
    /**
     * Id field name of the current table
     
     * @var string
     */
    private $idFieldName;


    /**
     * Repository name of current table. 
     *
     * This is needed by the Symfony databse abstraction,
     * exceute SQL.
     *
     * @var string
     */
    private $repositoryName;


    /**
     * Symfony form validatir object
     *
     * @var Symfony\Component\Validator\Validator\RecursiveValidator
     */
    private $validator;

    
    /**
     * Set entity manager params
     *
     * This a Symfony function. It is sirt contructor, to inialize the object with
     * given values.
     *
     * @param Symfony\Component\Validator\Validator\RecursiveValidator  $validator
     * @param string                                                    $idFieldName
     * @param string                                                    $repositoryName
     */
    public function setEntityManagerParams($validator, $idFieldName, $repositoryName) {

        $this->validator = $validator;
        $this->idFieldName = $idFieldName;
        $this->repositoryName = $repositoryName;
    }


    /**
     * Get repository name
     * 
     * @return string
     */
    public function getRepositoryName() {
        return $this->repositoryName;
    }

    /**
     * Find given field
     *
     * This is function executes a SQL query in format :
     *    SELECT * FROM $this->repositoryName  where $field = $value
     *
     * As default this finds by the id of the table ($this->idFieldName).
     *
     * @param $value            Value to search
     * @param $field            Database column to  search
     * @param array $options    options
     *                              'toArray'  If this variable is set:
     *                                          Convert all results from objects to array
     * @return array            
     *                              
     */
    public function find($value , $field = false, $options= []) {

        if (!$field) {
            $field = $this->idFieldName;
        }
        // make method name
        // Convert $this->fieldname xxx_yyy_zzz to findByXxxYyyZzz
        $methodName = ucwords(str_replace('_', ' ' , $field ));
        $methodName = 'findBy' . str_replace(' ', '' , $methodName);
        
        $res = $this->em
            ->getRepository($this->repositoryName)
            ->$methodName($value);
        
        if (isset($options['toArray'])) {
                $res = $this->toArray($res);
        }
        return  $res;
    }


    /**
     * Converts the Doctrine result set array of objects to array of arrays.
     *
     * As default the Doctrine functions return   array of objects. This function
     * convert the this to array of arrays.  And  the id  field of the table is used index.
     *
     * @param array $resultSet     standard result array of Doctrine query
     * @return array
     */
    protected function toArray($resultSet) {

        $indexedItems = [];
        array_map(
            function ($item) use (&$indexedItems) {
                $index = $item->get($this->idFieldName );
                $indexedItems[$index] = $item->toArray();
            },
            $resultSet
        );
        return $indexedItems;
    }
    

    /**
     * Update or insert to database
     * 
     * Thus is a genric function to update and insert to database.
     * You just need send as params an array of data to be updates
     *
     * @param array $data       Data to be inserted or updated.
     *                                 Example, insert:
     *                                   [  name => 'John Doe']
     *                                 Example update:
     *                                   [ 'i=> 23,  name => 'John Smith'] 
     *
     * @return integer          Id of the item. If you insert you get the id of the
     *                          new insert.            
     */
    public function save($data) {

        $this->log('Start function ' .__CLASS__ . '::' . __FUNCTION__ . ' with  data: ' . print_r($data, true) );

        // If id exists this is update
        $action = isset($data[$this->idFieldName])
            ? 'UPDATE' : 'INSERT';

        // Defineentity in a proper way
        $entity = ($action == 'INSERT')
            ?  $entity = $this->getDatabaseEntity()
            :  current($this->find($data[$this->idFieldName]));

        // Set data
        array_walk(
            $data,
            function($value, $key, &$entity) {
                $entity->set($key, $value);
            },
            $entity
            );

        // Excecute query
        $this->em->persist($entity);
        $this->em->flush();
        
        // return id
        return $entity->get($this->idFieldName);
    }

    
    /**
     * Delete item
     *
     * @param ineteger $id       Id of the row
     */
    public function delete($id) {
        $itemToDelete = current($this->find($id));
        $this->em->remove($itemToDelete);
        $this->em->flush();
    }


    /**
     * Generic validate function
     * 
     *  This uses the Symfony validator class to vaidate. 
     *  (The validation rules are defineded in the table entity classes)
     *
     * @param array $data    See function  'save'    
     * @return array          Set of error messages
     */
    public function validate($data) {
        $entity = $this->getDatabaseEntity();
        array_walk(
            $data,
            function($value, $key, &$entity) {
                $entity->set($key, $value);
            },
            $entity
        );

        $errors = $this->validator->validate($entity);
        $erroMessages = [];
        for($index = 0 ; $index < $errors->count(); $index++){
            $erroMessages[] = $errors->get($index)->getMessage();

        }

        return $erroMessages;
    }

    
    /**
     * Search with given params.
     * 
     * This function is used on an index page of my project, where you can
     * search by given criteria (filters) and order them by given criteria (sort).
     * As a result you get a list of rows. If the paging is set, only a section of
     * reults on the current page is returned.
     *
     *  This function creates dynamically a query with the given params.
     *
     * Example of filters:
     *
     * With this filter we filter:
     * 'timestamp' from table 'AppBundle:Logs' ( = L )
     * 'name' from table 'AppBundle:ClientSystems' ( = S )
     *
     * $filters = [
     *      [
     *          'field' => 'L.timestamp',
     *          'operator' => '>=',
     *          'value' => '2016-07-20',
     *      ],
     *      [
     *          'field' => 'S.name',
     *          'operator' => '=',
     *          'value' => 'Test 2',
     *      ],
     *];
     *
     * Example of sort:
     *
     *  $sort = [
     *      ['field' => 'L.type', 'dir' => 'ASC'],
     *      ['field' => 'L.level', 'dir' => 'DESC'],
     *  ];
     *
     *  See examples how to use this in
     * Tests\AppBundle\Controller\frontEndControllertest : testList() and testListPagination()
     * and in class AppBundle\Manager\Manager\Entity\Logs : getSystemsList()
     *
     * @param Doctrine\ORM\QueryBuilder $baseQuery          The base query
     * @param array                     $filters            See above
     * @param array                     $sort               See above
     * @param integer                   $page               If given the current page is returned, others the whole set
     *                                                      without limits
     * @param integer                   $maxItemsPerPage    If not defined the configured variable 'list_items_per_page'
     *                                                      is used.
     * @return \stdClass                                    This returns an object with following members
     *                                                          'list' => array of result records,
     *                                                          'totalPages' => total amount Pages,
     *                                                          'totalRecords' => total amount Records
     */
    protected  function getList($baseQuery, $filters = [], $sort = [], $page = 0, $maxItemsPerPage = false) {

        // Add filters
        array_walk(
            $filters,
            function($filter, $values, &$baseQuery) {
                $paramName = 'param_' . uniqid(); // unique id is to avoid delicate parameter names
                $where =  $filter['field'] . ' ' . $filter['operator'] .  ' :' . $paramName ;
                $baseQuery->andWhere($where)
                    ->setParameter($paramName, $filter['value']);
            },
            $baseQuery
        );

        //Add order by
        array_walk(
            $sort,
            function($sort, $values, &$baseQuery) {
                if (!empty($sort)) {
                    $baseQuery->addOrderBy($sort['field'] , $sort['dir']);
                }
            },
            $baseQuery
        );

        // Do query
        $query = $baseQuery->getQuery();

        // Get total number of items and pages
        $paginator = new Paginator($query, $fetchJoinCollection = false);
        $totalRecords = $paginator->count();
        $numberOfItemPerPage =  ($maxItemsPerPage)
            ? $maxItemsPerPage : $this->getContainer()->getParameter('list_items_per_page');
        $totalPages = ceil($totalRecords / $numberOfItemPerPage );


        // Do pagination
        if ($page) {
            $page = $page - 1;
            $firstResult = $page * $numberOfItemPerPage;
            $query->setFirstResult($firstResult)->setMaxResults($numberOfItemPerPage);
        }

        //var_dump($query->getSql());   // debug query

        $res = $query->getResult();

        return (object)[
            'list' => $res,
            'totalPages' => $totalPages,
            'totalRecords' => $totalRecords
        ];
    }


    /**
     * Get  menu
     *
     * This menu can be used with Symfony From class and method:
     * AppBundle\Manager\Manager\Form::get()
     *
     * @param string $labelField 
     * @return array
     */
    protected function getMenu($labelField) {

        $baseQuery = $this->em->createQueryBuilder()
            ->select('S')
            ->from($this->getRepositoryName(), 'S')
            ->orderBy('S.name');
        $query = $baseQuery->getQuery();
        $systems = $query->getResult();
        $menu = [];
        array_map(
            function ($system) use (&$menu, $labelField){
                $menu[] = [
                    'name' => $system->get($labelField),
                    'value' => $system->get($this->idFieldName)
                ];

            },
            $systems
        );
        return $menu;
    }
    
    
    /**
     * Get database entity object of the current child
     *
     * This is used in the clild classes to get the name of the entity class.
     *
     * @return mixed
     */
    protected function getDatabaseEntity() {
        $childClassName = $this->getChildClassName();
        $entityName = '\\AppBundle\\Entity\\' . $childClassName;
        return new $entityName();
    }
}
