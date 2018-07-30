<?php
/**
 * This class is used to test entities  in the folders:
 *
 *  src/AppBundle/Entity
 *  src/AppBundle/Manager/Entity
 *
 */
namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use AppBundle\Entity\ClientSystems;
use AppBundle\Manager\Manager\UnitTests;

class EntityTest extends WebTestCase
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
     * Test database connection and enitity ClientSystems
     *
     */
    public function testDataBaseConnection() {
        
        /**
         * In front end controller you do this by
         *         $products = $this->getDoctrine()
         *              ->getRepository('AppBundle:Product')
         *              ->findAll();
         */
        $emDefault = $this->unitTests->getDefaultEnityManager();

        $systems = $emDefault
            ->getRepository('AppBundle:ClientSystems')
            ->findAll();

        $numberOfItemsInTableClientSystems = 4;
        $this->assertEquals(
            $numberOfItemsInTableClientSystems ,
            count($systems),
            'Number of items in table clients_systems does not match with  ' . $numberOfItemsInTableClientSystems
        );

        $secondItem = $systems[1];
        $expectedName = 'Test 2';
        $this->assertEquals(
            $expectedName ,
            $secondItem->get('name'),
            'Name of the second item in table  clients_systems does not match with ' . $expectedName
        );
    }


    /**
     * testTabeLogs
     */
    public function testTableLogs() {
        $emDefault = $this->unitTests->getDefaultEnityManager();

        $logs = $emDefault
            ->getRepository('AppBundle:Logs')
            ->findAll();

        $numberOfItemsInTableClientSystems = 43;
        $this->assertEquals(
            $numberOfItemsInTableClientSystems ,
            count($logs),
            'Number of items in table logs does not match with  ' . $numberOfItemsInTableClientSystems
        );


        $secondItem = $logs[2];
        $expectedMessage = 'as asdasdasd asdBlaah asda asdasd';
        $this->assertEquals(
            $expectedMessage ,
            $secondItem->get('message'),
            'Name of the third item in table  clients_systems does not match with ' . $expectedMessage
        );

    }


    /**
     * Test entity ClientSystemManager and the class src/AppBundle/Manager/EntityManager.php
     *
     */
    public function testClientSystemManager() {

        $container = $this->unitTests->getContainer();
        $clientSystemsManager = $container->get('AppBundle.ClientSystemsManager');

        //
        // test get
        //
        $item = $clientSystemsManager->find(3);
        $expectedName = 'Test 3';
        $this->assertEquals(
            $expectedName ,
            current($item)->get('name'),
            'Name of the third item in table  clients_systems does not match with ' . $expectedName
        );

        //
        // test insert
        //
        $name = 'Test ' . uniqid();
        $apikey = uniqid();
        $pubkey = uniqid();
        $data = [
            'name' => $name,
            'apikey' => $apikey,
            'pubkey' => $pubkey
        ];
        $newId = $clientSystemsManager->save($data);
        $this->assertEquals(
            true ,
            $newId > 0 ,
            'Item not inserted.'
        );

        //
        // Check that the values of inserted item are correct
        //
        $newItem = current($clientSystemsManager->find($newId));
        $this->assertEquals(
            $name ,
            $newItem->get('name'),
            'Item not correctly inserted'
        );

        //
        // Test udpate
        //
        $apikey = uniqid();

        $data = [
            'systemid' => $newId,
            'apikey' => $apikey,
        ];
        $newId = $clientSystemsManager->save($data);

        //
        // Check that the values of inserted item are correct
        //
        $newItem = current($clientSystemsManager->find($newId));
        $this->assertEquals(
            $apikey ,
            $newItem->get('apikey'),
            'Item not correctly saved'
        );

        //
        // Test delete
        //
        $clientSystemsManager->delete($newId);
        $newItem = current($clientSystemsManager->find($newId));
        $this->assertEquals(
            false ,
            $newItem,
            'Item deleted'
        );
    }

    /**
     * This tests mainly parts which are specific for this table
     * The common entity functions are tested before this test.
     *
     */
    public function testLogManager()
    {
        $container = $this->unitTests->getContainer();
        $logsManager = $container->get('AppBundle.LogsManager');

        //
        // test get by id
        //
        $item = $logsManager->find(3);
        $expectedName = 'as asdasdasd asdBlaah asda asdasd';
        $this->assertEquals(
            $expectedName,
            current($item)->get('message'),
            'Message of the third item in table  logs does not match with ' . $expectedName
        );

        //
        // test get by system id
        //
        $items = $logsManager->find(3, 'client_systems_id');
        $expectedAmount = 24;
        $this->assertEquals(
            $expectedAmount,
            count($items),
            'Test get by system id failed '
        );
        
    }

    /**
     * The log insert validation
     *
     */
    public function testLogValidation()
    {
        $useCases = [
            [
                'label' => 'no errors',
                'data' => [
                        'type' => '1',
                        'level' => 3,
                        'clientSystemsId' => 2,
                        'message' => 'blaah'
                    ],
                'nroOfErrors' => 0
            ],

            [
                'label' => 'All  errors',
                'data' => [],
                'nroOfErrors' => 4
            ],

            [
                'label' => 'Type and Level wrong range',
                'data' => [
                    'type' => '11',
                    'level' => 9,
                    'clientSystemsId' => 2,
                    'message' => 'blaah'
                ],
                'nroOfErrors' => 2,
                'expectedErrors' => [
                        'Level must be 1,2 or 3 ( 1 = \'Error\', 2 =  \'Warn\', 3 = \'Notice\' )',
                        'Type must be 1,2 or 3 ( 1 = \'Application\', 2 =  \'Security\', 3 = \'System\' )',
                ]
            ]

        ];
       
        $logsManager = $this->unitTests->getContainer()->get('AppBundle.LogsManager');

        foreach ($useCases as $case)  {
            $errors  = $logsManager->validate($case['data']);
            $this->assertEquals(
                $case['nroOfErrors'],
                count($errors),
                'Case , number of erros does not match : ' . $case['label']
            );

            if (isset($case['expectedErrors'])) {
                $this->assertEquals(
                    $case['expectedErrors'],
                    $errors,
                    'Case , error message does not match : ' . $case['label']
                );
            }
        }
    }


    public function testUserManager() {
        $userManager = $this->unitTests->getContainer()->get('AppBundle.UserManager');
        $user = $userManager->find('tuulia', 'username');
        $email = current($user)->get('email');
        $expectedEmail = 'tuulia@imotions.nl';
        $this->assertEquals(
            $expectedEmail,
            $email
        );
    }

    
}
