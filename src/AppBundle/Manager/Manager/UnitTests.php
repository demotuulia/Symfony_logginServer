<?php
/**
 * A class containing a set of functions used in the php unit tests
 * 
 * Note: this class is note called as a service , but as
 * with a raw php object in unit test classes:
 * 
 *      $kernel = static::createKernel();
 *      $this->unitTests = new UnitTests($kernel);
 *
 */
namespace AppBundle\Manager\Manager;

use AppBundle\Manager\Manager;


class UnitTests extends Manager {
    /**
     * Url to our api
     *
     * @var string
     */
    private $apiBaseUrl;


    /**
     * @var AppKernel
     */
    private $kernelObj;
    

    /**
     * @var appTestDebugProjectContainer
     */
    private $container;


    /**
     * UnitTests constructor.
     *
     * @param AppKernel $kernel
     */
    public function __construct($kernel) {
        $this->setKernel($kernel);
        $this->container = $this->kernelObj->getContainer();
        $this->apiBaseUrl = $this->container->getParameter('api_base_url');
    }


    /**
     * getContainer
     * 
     * @return appTestDebugProjectContainer
     */
    public function getContainer() {
        return $this->container;
    }
    
    /**
     * Set kernel object
     * 
     *  @param AppKernel $kernel
     */
    private function setKernel($kernel) {
        $this->kernelObj = $kernel;
        $this->kernelObj->boot();
    }


    /**
     * Reset database so that all tests can be done
     *
     */
    public function resetDatabase() {
        $container = $this->container;
        $user = $container->getParameter('database_user');
        $password = $container->getParameter('database_password');
        $host = $container->getParameter('database_host');
        $dbName = $container->getParameter('database_name');
        $scriptPath = (__DIR__ . '/../../../../tests/AppBundle/database/testDatabase.sql');

        $command = "mysql -u{$user} -p{$password} "
            . "-h {$host} -D {$dbName} < {$scriptPath}";

        shell_exec($command);
    }

    
    /**
     * Send a curl request
     * 
     * @param $uri              The uri part , corresponing routes in src/AppBundle/Controller/ApiController.php
     * @param $type             'login' or 'insert' or 'update'
     * @param array $params     'apiKey'  Mandatory api key of the current system
     *                          'postFields' array of the fields  to update or insert,
     *
     * @return array
     */
    public function sendCurlRequest($uri, $type, $params = []) {
        
        // Set query string params
        $queryStringParams = [];
        $queryStringParamsKeys = ['xSignature'];
        foreach($queryStringParamsKeys as $key)
            if (isset($params[$key])) {
                $queryStringParams[$key] = $params[$key];
            }
        $url =  $this->apiBaseUrl . $uri . '?' . http_build_query( $queryStringParams );


        // Set common curl options
        $curl_options = [];
        $curl_options[CURLOPT_URL] = $url;
        $curl_options[CURLOPT_RETURNTRANSFER] = true;
        $curl_options[CURLOPT_SSL_VERIFYPEER] = false;
        $curl_options[CURLOPT_SSL_VERIFYHOST]= false;

        // Set fields for POST or PUT method in update and insert types
        $data_string = '';
        if (isset($params['postFields'])) {
            $data_string = json_encode($params['postFields']);
            $curl_options[CURLOPT_POSTFIELDS] = $data_string;
            switch ($type) {
                case 'update': $method = 'PUT'; break;
                case 'insert': $method = 'POST'; break;
            }
            $curl_options[CURLOPT_CUSTOMREQUEST] = $method;
        }


        // Set header
        $header = [];
        if (isset($params['apiKey'])) {
            $header[] = "Authorization: Bearer " . $params['apiKey'];
        }

        switch ($type) {
            case 'login' :
                break;
            default: // 'insert' and 'update'
                $header[] = 'Content-Type: application/json';
                $header[] = 'Content-Length: ' . strlen($data_string);
                break;
        }

        $curl_options[CURLOPT_HTTPHEADER] = $header;

        $connection = curl_init();
        curl_setopt_array($connection, $curl_options);

        $response = curl_exec($connection);

        $info = curl_getinfo($connection);
        return ['response' => $response, 'info' => $info];
    }


    /**
     * getDefaultEnityManager
     *
     *  This needed to call database entities
     *
     * @return Doctrine\ORM\EntityManager
     */
    public function getDefaultEnityManager() {
        return $this->container
            ->get('doctrine')
            ->getManager();
    }


    /**
     * getCredentials
     * @param $systemName   name of the system in logginServerTest.client_systems.name
     * @return array
     */
    function getCredentials($systemName) {
        
        $credentials =  [];
        
        // Replace $systemName spaces by _
        $systemName = str_replace(' ', '_' ,$systemName );
        
        $apiKey = $this->container->getParameter('api_key_' . $systemName);
        $credentials['apiKey'] = $apiKey;
        
        return $credentials;
    }
}