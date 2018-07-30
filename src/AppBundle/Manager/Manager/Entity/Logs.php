<?php
/**
 *  A service class to manage table logs
 * 
 */
namespace AppBundle\Manager\Manager\Entity;

use AppBundle\Manager\Manager\EntityManager;
use AppBundle\Manager\HttpExceptionManager;
use AppBundle\Manager\Manager\Bootstrap;
use Symfony\Component\Config\Definition\Exception\Exception;

final class Logs extends EntityManager{

    /**
     * Variable for function getLogsList. Filter field for 'type'
     *
     * @var string
     */
    public static $TYPE_FILTER_FIELD = 'L.type';


    /**
     * Variable for function getLogsList. Filter field for 'level'
     *
     * @var string
     */
    public static $LEVEL_FILTER_FIELD = 'L.level';


    /**
     * Variable for function getLogsList. Filter field for 'system'
     *
     * @var string
     */
    public static $SYSTEM_FILTER_FIELD = 'S.systemid';


    /**
     * Variable for function getLogsList. Filter field for 'timestamp'
     *
     * @var string
     */
    public static $TIMESTAMP_FILTER_FIELD = 'L.timestamp';


    /**
     * Variable for function getLogsList. Filter field for 'system'
     *
     * @var string
     */
    public static $LOG_ID_FILTER_FIELD = 'L.logid';


    /**
     * Table row classes used for diffent log levels
     *
     * @var array
     */
    private $bootsStrapTableClasses =[];

    /**
     * insert  a new log (from API)
     *
     * @param integer                   $systemId  system id to insert (in table client_systems)
     * @param \stdClass $logData        data to insert:
     *                                      (object)[
     *                                          'type' => id from table logs_type
     *                                          'level' => id from table logs_levels
     *                                          'message' => string
     *                                      ]
     * @param string $xSignature            Signature , created by the algorithm in
     *                                          AppBundle\Manager\Manager\Entity\ClientSystems::createXSignature
     */
    public function insert($systemId, $logData, $xSignature) {

        // Add system Id to logData
        if (is_object($logData)) {
            $logData->clientSystemsId = $systemId;
        }

        $this->validateLog($logData);

        $isValidSignature = $this->getContainer()
            ->get('AppBundle.ClientSystemsManager')
            ->verifyXSignature($logData->message,  $xSignature, $systemId);

        if (!$isValidSignature ) {
            $this->throwException(HttpExceptionManager::$UNAUTHORIZED, 'X-signature not valid.');
        }

        // insert
        $logId = $this->save(get_object_vars($logData));

        $this->sendMailAlerts($logId);
        return $logId;
        
    }

    /**
     * Validate log data before inserting
     *
     * @param $logdata
     * @throws Exception
     */
    private function validateLog($logData) {

        if (!is_object($logData)) {
            $this->throwException(HttpExceptionManager::$BAD_REQUEST,  'No  log data given');
        }

        // Validate
        $errors = $this->validate($logData);

        if (!empty($errors)) {
            $this->throwException(HttpExceptionManager::$BAD_REQUEST, implode(', ', $errors ));
        }
    }


    /**
     * sendMailAlerts after inserting a new log
     * 
     * @param $logId
     */
    private function sendMailAlerts($logId) {
        $mailAlertManager = $this->getContainer()->get('AppBundle.MailAlert');
        $mailAlertManager->sendMails($logId);
    }

    /**
     *  Define table row classes to be used with differen levels
     *
     */
    function defineBootstrapClasses() {
        if (empty($this->bootsStrapTableClasses)) {
            $this->bootsStrapTableClasses = [
                'Error' => Bootstrap::$TABLE_ROW_DANGER,
                'Warn' => Bootstrap::$TABLE_ROW_WARNING,
                'Notice' => Bootstrap::$TABLE_ROW_SUCCESS
            ];
        }
    }

    /**
     * getList with the optional params
     *
     *
     * @param array $filters            See parent function
     * @param array $sort               See parent function
     * @param integer page              See parent function
     * @param integer $maxItemsPerPage  See parent function
     * @return \stdClass                See parent function
     */
    public function getLogsList($filters = [], $sort = [], $page = 0, $maxItemsPerPage = false) {

        // Add default sort if no sort definedn
        if (empty($sort[0])) {
            $sort[0] =  ['field' => 'L.timestamp' , 'dir' => 'DESC' ];
        }

        // Base query
        $dummyItem = 'L'; // wee need to give this, others the symfony pagination object does not worl (bug)
        $baseQuery = $this->em->createQueryBuilder()
            ->select($dummyItem , 'L.logid, L.timestamp, S.name, LT.name as type,  LL.name AS level, L.message')
            ->from($this->getRepositoryName(), 'L')
            ->leftJoin('AppBundle:ClientSystems', 'S', 'WITH', 'S.systemid = L.clientSystemsId')
            ->leftJoin('AppBundle:LogsTypes', 'LT', 'WITH', 'LT.id = L.type')
            ->leftJoin('AppBundle:LogsLevels', 'LL', 'WITH', 'LL.id = L.level')
            ->where('1 = 1');
       
        $list = parent::getList($baseQuery, $filters, $sort, $page, $maxItemsPerPage);
        $this->defineBootstrapClasses();
        // Format list
        array_walk(
            $list->list,
            function (&$list){
                unset($list[0]); // delete item selected by $dummyItem
                $list['timestamp'] = date('d-M-Y h:m:s',strtotime($list['timestamp']));;
                $list['class'] = $this->bootsStrapTableClasses[$list['level']];
            }
        );
       return $list;
      
    }
}