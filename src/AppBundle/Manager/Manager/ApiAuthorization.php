<?php
/**
 * The  class to manage the authorization and encrypting process.
 * In the API requets
 *
*/
namespace AppBundle\Manager\Manager;

use AppBundle\Manager\Manager;
use AppBundle\Manager\HttpExceptionManager;


final class ApiAuthorization extends Manager {
    
    /**
     * @var AppBundle\Manager\Manager\Enity\ClientSystems
     */
    private  $clientSystemsManager;

    
    /**
     * Authorization constructor.
     *
     * @param AppBundle\Manager\Manager\Enity\ClientSystems   $clientSystemsManager
     */
    public function __construct($clientSystemsManager)
    {
        $this->clientSystemsManager = $clientSystemsManager;
    }


    /**
     * Authorize
     *
     * To call any API requests, the request must contain the correct
     * API key in the header:
     * http://loggingServer/api/REQUEST
     *                                      headers: "Authorization: Bearer XXXXXX"
     *
     *                                      Authorization       Api key of the system
     *                                                          in the table `client_systems`
     * 
     * 
     * @param stdClass $data        This must contain item 'Apikey'
     * @return int                  `client_system_id`  in table `client_systems`
     */
    public function authorize($data) {

        // Check if api key is set
        if (!isset($data->apiKey)) {
            $this->throwException(HttpExceptionManager::$UNAUTHORIZED);
        }

        // Format the key
        $apiKey = str_replace('Bearer ' ,'' , $data->apiKey );

        $system = $this->clientSystemsManager->find($apiKey, 'apikey');

        if (!$system ) {
            $this->throwException(HttpExceptionManager::$FORBIDDEN);
        } else {
            return current($system)->get('systemid');
        }
    }
    

}
    