<?php
/**
 *  A service class to manage table app_users
 *
 */
namespace AppBundle\Manager\Manager\Entity;
 
use AppBundle\Manager\Manager\EntityManager;
use Doctrine\ORM\Query;
use AppBundle\Entity\MailAlert as MailAlertEntity;
use AppBundle\Manager\Manager\Entity\Logs;
 
final class MailAlert extends EntityManager {
 
 
    /**
     * Alert get by the function  getById($id)
     * 
     * @var array
     * 
     */
    private $alert =[];
 
 
    /**
     * mailAlertFilterManager
     *
     *
     * @var AppBundle\Manager\Manager\Entity\MailAlertFilter
     */
    private $mailAlertFilterManager;


    /**
     * A cache of all users in table 'app_users'
     *
     * @var array
     */
    private $usersCache = [];

    /**
     * MailAlert constructor.
     *
     * @param  AppBundle\Manager\Manager\Entity\MailAlertFilter $mailAlerFilterManager
     */
    public function __construct($mailAlertFilterManager)
    {
       $this->mailAlertFilterManager = $mailAlertFilterManager;
    }
 
 
    /**
     * Get one Mail alert by id
     *
     * The is not called in public  if the content needed you use $this->getCurrentAlert()
     *
     * @param $id
     * @return array
     */
    private function getById($id) {
 
        // Get alert
        $alert = $this->find($id);

        // check if item is found for the given id
        if(empty($alert)) {
            return false;
        }
        $this->alert = current($alert)->toArray();

        // Get filters
        $this->alert['filters'] = $this->mailAlertFilterManager->getFilters($id);
        $this->alert['filters'] = array_map(function ($filter) {return $filter->toArray();}, $this->alert['filters'] );
    }
 
 
    /**
     * getCurrentAlert
     * 
     * @return array
     */
    public function getCurrentAlert(){
        return $this->alert;
    }


    /**
     * Validate Alert
     * 
     *
     * We only need to validate the filters.
     * 
     * @return array
     */
    public function validateAlert()
    {
        $errors = [];
        array_walk(
            $this->alert['filters'],
            function ($filter ) use (&$errors) {
               $errors = array_merge($errors, $this->mailAlertFilterManager->validate($filter));

            }
        );
        return $errors;
    }


    /**
     * Get List By User Id
     *
     * @param $appUserId
     * @return \stdClass
     */
    public function getListByUserId($filters = [], $sort = [], $page = 0, $maxItemsPerPage = false) {

        //
        // Get list
        //

        // Base query
        $dummyItem = 'MA'; // wee need to give this, others the symfony pagination object does not worl (bug)
        $baseQuery = $this->em->createQueryBuilder()
            ->select($dummyItem, 'MA.mailAlertId', 'MA.active', 'MA.appUserId')
            ->from($this->getRepositoryName(), 'MA')
            ->where('1 = 1');
 
        $list = parent::getList($baseQuery, $filters, $sort, $page, $maxItemsPerPage);

        //
        // Add filters
        //
        for($index = 0 ; $index < count($list->list); $index++) {
            unset($list->list[$index][0]); // delete dummy item
            $this->getById($list->list[$index]['mailAlertId']);
            $list->list[$index]['filters'] = $this->getCurrentAlert();
        }
        
        return $list;
 
    }

    
    /**
     * Set a value for the given filed of the current alert.
     *
     * If id is given the alert is read from database.
     *
     * @param $field   Field in table MailAlert or a key in array in class and function: AppBundle\Manager\Manager\Entity::getFilterTypes( )
     * @param $value
     */
    public function set($field, $value) {
         
        if ($field == 'id') {
            $this->getById($value);
            return;
        }
       
        // Set value in MainAlerts, if it belongs there
        if ($this->isMailAlertField($field)) {
            $this->alert[$field] = $value;
        }
 
        // Set value in filters, if it belongs there
        $filterIndex  = $this->getFilterIndexInCurrentAlert($field);
        if ($filterIndex >= 0 ) {
            // Find the index of the given field
            $this->alert['filters'][$filterIndex]['value'] = $value;
        }
       
    }
 
 
    /**
     * Create a new empty alert (not save in the datase)
     *
     * This used to insert a new item.
     * For this we create an array  like:
     *
     * [
     *     'active' => '',
     *     'appUserId' => '',
     *     'filters' => [
     *          '0' => [
     *              'filterField' => 'S.name',
     *              'operator' => '=',
     *              'value' => '',
     *          ],
     *          '1' => [
     *              'filterField' => 'L.system',
     *              'operator' => '=',
     *              'value' => '',
     *          ],
     *          '2' => [
     *              'filterField' => 'L.level',
     *              'operator' => '=',
     *              'value' => '',
     *          ],
     *     ],
     * ]
     */
    public function create() {
        
        // Create en empty array with keys from table MailAlert
        $fields = array_flip(MailAlertEntity::fields()) ;
        $this->alert = array_map(function($t){return '';},$fields);
        // Delete mailAlertId 
        unset($this->alert['mailAlertId']);
         
        
        // add filters
        $this->alert['filters'] =  array_values( $this->mailAlertFilterManager->getFilterTypes());   
       
    }
 
    /**
     * Get the value of the give field
     *
     * Note before using this function you must define an alert by 'set' or 'create' functions
     *
     * @param $field   Field in table MailAlert or a key in array in class and function: AppBundle\Manager\Manager\Entity::getFilterTypes( )
     *
     * @return mixed
     */
    public function get($field) {
        // Get value in MainAlerts, if it belongs there
        if (in_array($field, MailAlertEntity::fields())) {
            return $this->alert[$field];
        }
 
        // Set value in filters, if it belongs there
        $filterIndex  = $this->getFilterIndexInCurrentAlert($field);
        if ($filterIndex >= 0 ) {
            return $this->alert['filters'][$filterIndex]['value'];
        }
    }
 
 
    /**
     * Check if the give filed is in table MailAlert
     *
     * @param $field  Field to check
     * @return bool
     */
    private function isMailAlertField($field)  {
        return in_array($field, MailAlertEntity::fields());
    }
 
    /**
     *  Get the index of the given filter type in array $this->alert['filters']
     *
     * If type not found return -1
     *
     *
     * @param $filterType       Field in table MailAlert or a key in array in class and function: AppBundle\Manager\Manager\Entity::getFilterTypes( )
     * @return int              index
     */
    private function getFilterIndexInCurrentAlert($filterType) {
      
        $filterTypes = $this->mailAlertFilterManager->getFilterTypes();

        if (in_array($filterType, array_keys($filterTypes) )) {
            $currentAlertFilters = $this->alert['filters']; 
            $filterType = $filterTypes[$filterType]['filterField'];
            $index = array_search($filterType, array_column($currentAlertFilters, 'filterField'));
           
            return $index;
        }
        return -1;
    }
 
 
    /**
     * Save
     *
     * Insert or update. No mailAlertId is given, a new item is inserted.
     *
     * @return int   id of the alert
     */
    public function saveAlert() {
       
        $id = parent::save($this->alert);
        
        array_walk(
                $this->alert['filters'],
                function ($filter, $k, $id) {
                        $filter['mailAlertId'] = $id;
                        $this->mailAlertFilterManager->save($filter);
                        
                },
                $id        
            );

        return $id;
    }


    /**
     * Send mails
     * 
     * This mail is to be called after a log statment is added.
     * This function checks if there are alerts to be sent.
     *
     * This function  should be called every time a new log
     * is inserted.
     * 
     * @param $logId    Log to check, id in  `logs`.`logid`
     * @return array    Array of sent mails, for unit tests
     */
    public function sendMails($logId) {

        // Get all active mail alerts
        $alerts = $this->find(1, 'active');

        $sentMails = []; // An array to return for unit tests

        // Check if the criteria of the alert matches with the log and send mail
        array_walk (
            $alerts,
            function ($alert) use ( $logId, &$sentMails) {

                // get filters of the array
                $mailAlertId = $alert->get('mailAlertId');
                $filters = $this->getContainer()
                    ->get('AppBundle.MailAlertFilter')
                    ->find($mailAlertId , 'mailAlertId' , ['toArray' => true ]);

                // convert filters format you can search with function ('AppBundle.LogsManager')->getLogsList();
                $searchFilters = array_map (
                    function ($filter) {
                        return [
                            'field' => $this->mailAlertFilterManager->getFilterDatabaseField($filter['filterField']),
                            'operator' => $filter['operator'],
                            'value' => $filter['value']
                        ];
                    } ,
                    $filters
                );

                // filter away  filters which has value 0
                $searchFilters = array_filter($searchFilters, function ($filter){ return $filter['value'] > 0; });

                // Add log logId to filter
                $logIdFilter =  [['field' => logs::$LOG_ID_FILTER_FIELD, 'operator' => '=' , 'value' => $logId]];
                $searchFilters = array_merge($searchFilters, $logIdFilter);

                // check if out log matches with the criteria
                $logs = $this->getContainer()->get('AppBundle.LogsManager')->getLogsList($searchFilters);
                if ($logs->totalRecords > 0) {

                    $sentMails[] = $this->sendMail($logs->list[0], $alert);
                }
            }
        );
        return $sentMails;
    }


    /**
     * Send one alert mail to a log found by the function 'sendMails'
     *
     * 
     * @param array                         $log
     * @param AppBundle\Entity\MailAlert    $alert
     * @return array                                    A test array for unit tests
     */
    private function sendMail($log, $alert) {

        $users = !empty($this->usersCache)
            ? $this->usersCache
            : $this->getContainer()->get('AppBundle.UserManager')->getAllUsers();

        $userId = $alert->get('appUserId');

        $body = 'The following log message has been sent to the log server:  ' .
            $this->getContainer()->getParameter('host') . "\n" .
            print_r($log, true);
        $body = nl2br($body);
        
        $emailManager = $this->getContainer()->get('AppBundle.EmailManager');
        $emailManager->setTo($users[$userId]['email']);
        $emailManager->setSubject('Mail alert  with level ' . $log['level']);

        $emailManager->setBody($body);
        $emailManager->send();

        return [
            'email' => $users[$userId]['email'],
            'logId' => $log['logid']
        ];
    }
}