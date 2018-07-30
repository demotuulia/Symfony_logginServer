<?php
/**
 * This class is to test the API requests
 * 
 */
namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use AppBundle\Entity\ClientSystems;
use AppBundle\Manager\Manager\UnitTests;
use AppBundle\Manager\HttpExceptionManager;
use Symfony\Component\DependencyInjection\Tests\Compiler\H;

class ApiControllerTest extends WebTestCase
{

    /**
     * @var AppBundle\Manager\UnitTests
     */
    private $unitTests;

    /**
     * Initialize tests
     */
    protected function setUp()
    {
        $kernel = static::createKernel();
        $this->unitTests = new UnitTests($kernel);
        $this->unitTests->resetDatabase();
    }



    /**
     * Test that the API connection is OK
     */
    public function testTestApi() {
        $result = $this->unitTests->sendCurlRequest( '/test', 'list' ,[]);
        $httpCode = $result['info']['http_code'];
        $this->assertEquals(
            HttpExceptionManager::$SUCCESS,
            $httpCode,
            'Response http code not OK.'
        );

        $expected = '{"a":[1,2,3],"0":"b","1":"c"}';
        $this->assertEquals(
            $expected,
            $result['response'],
            'Response not correct.'
        );
    }


    /**
     * testAuthorization
     *
     */
    public function testAuthorization() {

        $useCases = [
            [
                'label' => 'Test with correct login',
                'credentials' => $this->unitTests->getCredentials('Test 2'),
                'expectedHttpCode' => HttpExceptionManager::$SUCCESS,
                'expectedSystemId' => 2
            ],
            [
                'label' => 'Test with incorrect ApiKey',
                'credentials' => ['apyKey' => 'WORNG'],
                'expectedHttpCode' => HttpExceptionManager::$UNAUTHORIZED,
            ],
            [
                'label' => 'Test with correct login',
                'credentials' => [],
                'expectedHttpCode' => HttpExceptionManager::$UNAUTHORIZED
            ]
        ];

        foreach ($useCases as $case) {
            $result = $this->unitTests->sendCurlRequest( '/testauthorize/' , 'login', $case['credentials'] );
            $httpCode = $result['info']['http_code'];

            $this->assertEquals(
                $case['expectedHttpCode'],
                $httpCode,
                'Http code is wrong with case:  ' . $case['label']
            );

            if (isset($case['expectedSystemId'])) {
                $systemId = current(json_decode($result['response']));

                $this->assertEquals(
                    $case['expectedSystemId'],
                    $systemId,
                    'System id is wrong with case:  ' . $case['label']
                );
            }
        }
    }


    /**
     * Here we test to send a message, the for validation is
     * tested in unitTests
     * 
     * Note this inserts to the DEV database (configured in app/config/parameters.yml)
     * Instead of the test database. Because with the API call we cannot use TEST database.
     */
    public function testSendMessage() {

        // Definitions to encrypt the message
        $container = $this->unitTests->getContainer();
        $clientSystemsManager = $container->get('AppBundle.ClientSystemsManager');

        

        // Note: In 'logData' we don't need to give system Id because it is defined
        // in the authorization apiKey
        for ($clientSystemId = 1 ; $clientSystemId <=4 ; $clientSystemId++) {

            $privateKey = $container->getParameter('private_key_Test_' . $clientSystemId);
            $message = 'Message with random id' . uniqid();
            $clientSystemName = 'Test ' . $clientSystemId;  // variable in client_systems

            $credentials = array_merge(
                $this->unitTests->getCredentials($clientSystemName),
                ['xSignature' => $clientSystemsManager->createXSignature($message, $privateKey)]
            );

            $wrongCredentials = array_merge(
                $this->unitTests->getCredentials($clientSystemName),
                ['xSignature' => 'wrong']
            );


            $useCases = $this->getUseCasesForTestSendMessage($message, $credentials, $wrongCredentials);

            foreach ($useCases as $case) {

                $data = $case['data'];
                $data['postFields']  =  ['logData' => $case['logData']];

                $result = $this->unitTests->sendCurlRequest( '/insertlog/' , 'insert', $data );

                $httpCode = $result['info']['http_code'];

                $this->assertEquals(
                    $case['expectedHttpCode'],
                    $httpCode,
                    'Http code is wrong with system "' . $clientSystemName . '",case:  ' . $case['label']
                );


                // Check if item is inserted
                if ($httpCode == HttpExceptionManager::$CREATED) {
                    $newSystemId = current(json_decode($result['response']));
                    $this->assertEquals(
                        true,
                        $newSystemId,
                        'No data insetered with system "' . $clientSystemName . '", case :  ' . $case['label']
                    );
                }
            }
        } // END for ($clientSystemId = 1 ; $clientSystemId <=4 ; $clientSystemId++)
    }


    /**
     * getUseCasesForTestSendMessage
     *
     * A sub function of the function 'testSendMessage'
     *
     * @param $message
     * @param $credentials
     * @param $wrongCredentials
     * @return array
     */
    private function getUseCasesForTestSendMessage($message, $credentials, $wrongCredentials) {
        $useCases = [
            [
                'label' => 'Test with correct log data',
                'data' => $credentials,
                'logData' =>[
                    'type' => '2',
                    'level' => 1,
                    'message' => $message,
                ]
                ,
                'expectedHttpCode' => HttpExceptionManager::$CREATED,
            ],

            [
                'label' => 'Test with correct log data, wrong x-signature',
                'data' => $wrongCredentials,
                'logData' =>[
                    'type' => '1',
                    'level' => 3,
                    'message' => $message,

                ],
                'expectedHttpCode' => HttpExceptionManager::$UNAUTHORIZED,
            ],


            [
                'label' => 'Test with incorrect log data, type not correct range',
                'data' => $credentials,
                'logData' =>[
                    'type' => '12',
                    'level' => 1,
                    'message' => $message,
                ],
                'expectedHttpCode' => HttpExceptionManager::$BAD_REQUEST,
            ],

            [
                'label' => 'Test with incorrect log data, missing message',
                'data' => $credentials,
                'logData' =>[
                    'type' => '12',
                    'level' => 1
                ],
                'expectedHttpCode' => HttpExceptionManager::$BAD_REQUEST,
            ],
            [
                'label' => 'Test with empty log data',
                'data' => $credentials,
                'logData' => [],
                'expectedHttpCode' => HttpExceptionManager::$BAD_REQUEST,
            ],

        ];

        return $useCases;
    }
    
    
}
