<?php
/**
* This a Symfony controller class and  is called when a client sends an API request to add a new
* log to the database.
*/
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Manager\HttpExceptionManager;

class ApiController extends Controller
{
    /**
     * A simple function to test that the API works with unit tests
     *
     * ----------------------------
     * Curl example:
     * ----------------------------
     * >curl http://loggingserver.nl/api/test
     *
     * Response:
     * {"a":[1,2,3],"0":"b","1":"c"}
     *
     *
     * @Route("/api/test")
     */
    public function testAction()
    {
        //$response = new Response(json_encode([122,34,45]));
        $test = ['a' => [1,2,3] , 'b', 'c'];
        $test = json_encode($test);
        $response = new Response($test);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }


    /**
     * A simple function to test authorization with unit tests
     *
     *
     * ----------------------------
     * Curl example
     * ----------------------------
     * With system 'Test 3':
     *
     * >curl \
     * --header "Authorization: Bearer API_KEY"  \
     * http://loggingserver.nl/api/testauthorize/
     *
     *                                                          Authorization   API_KEY =    Api key of the system
     *                                                          in the table `client_systems`
     * Response:
     * (id of 'Test 3' in table `client_systems` :
     * [3]
     *
     *
     *
     * @Route("/api/testauthorize/")
     */
    public function testAuthorizationAction()
    {
        $data = $this->getRequestData();
        $systemId = $this->authorize($data);

        $test = json_encode([$systemId]);
        $response = new Response($test);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }


    /**
     * Insert New log
     *
     * =======================================================
     * Insert new log
     * =======================================================
     *
     *  http POST "http:yourdomain//api/insertlog/" data:='__JSON__'  --json -a
     *                                      headers: "Authorization: Bearer API_KEY"
     *
     *                                      Authorization        API_KEY =  Api key of the system
     *                                                          in the table `client_systems`
     *
     * __JSON__ = {"logData":{"type":"1","level":3,"message":"blaah222"}}
     *
     *  __JSON__ in pretty format:
     * {
     *      "logData": {
     *          "type":"1",
     *          "level":3,
     *          "message":"blaah"
     *      }
     * }
     *
     * ----------------------------
     * Curl example:
     * ----------------------------
     * With 'Test 3', who has 'apikey'  API_KEY in the table `client_systems`
     * >curl \
     *   --header "Authorization: Bearer API_KEY"  \
     *   http://loggingserver.nl/api/insertlog/ \
     *   POST \
     *   -H "Content-Type: application/json" \
     *   -d '{"logData":{"type":"1","level":3,"message":"blaah222"}}' \
     *   
     *
     * Response:
     * (id of the new log in table 'logs'
     *
     * [41]
     *
     *
     * @Route("/api/insertlog/")
     */
    public function insertLogAction()
    {
        $data = $this->getRequestData();
        $systemId = $this->authorize($data);
        
        $logManager = $this->get('AppBundle.LogsManager');
        $logId = $logManager->insert($systemId, $data->logData, $data->xSignature );
        
        $response = new Response(json_encode([$logId]));
        $this->log(get_class($response));
        $response->setStatusCode(HttpExceptionManager::$CREATED);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
    
    

    /**
     * Authorize
     *
     * This should be called in every function to ensure authorize access.
     *
     * @param $data
     */
    private function authorize($data) {
        $systemManager = $this->get('AppBundle.ApiAuthorizationManager');
        return $systemManager->authorize($data);

    }

    
    /**
     * Get request data from post and headers of the request
     *
     * Separate some important params:
     *      data                All request data
     *      apiKey              Clear api key (as in client_systems.apikey)
     *
     *
     * @return object
     */
    private function getRequestData()
    {
        $request = Request::createFromGlobals();
        $fileData = json_decode(file_get_contents('php://input'));
        return (object)[
            'data' => $_REQUEST,
            'logData' => isset($fileData->logData) ? $fileData->logData : false,
            'apiKey' => $request->headers->get('authorization'),
            'xSignature' => isset($_GET['xSignature']) ? $_GET['xSignature'] : false,

        ];
    }

    /**
     * Set log statement
     *
     * @param string $message
     * @param string $type
     */
    private function log($message , $type = 'debug') {
        $this->get('appBundle.MonoLogManager')->log($message , $type);
    }

}
