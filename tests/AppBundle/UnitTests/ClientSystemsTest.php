<?php
/**
 * This class is used to test manager and entity for table client_systems
 *
 */
namespace Tests\AppBundle\UnitTests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use AppBundle\Manager\Manager\UnitTests;

class ClientSystemsTest extends WebTestCase
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
        // Test update
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
     * Test entity ClientSystemManager and the class src/AppBundle/Manager/EntityManager.php
     *
     */
    public function testSystemMenu()
    {

        $container = $this->unitTests->getContainer();
        $clientSystemsManager = $container->get('AppBundle.ClientSystemsManager');

        $menu = $clientSystemsManager->getMenu();
        $expectedMenu = [
            0 => [
                'name' => 'Test 1',
                'value' => 1,
            ],
            1 => [
                'name' => 'Test 2',
                'value' => 2,
            ],
            2 => [
                'name' => 'Test 3',
                'value' => 3,
            ],
            3 => [
                'name' => 'Test 4',
                'value' => 4,
            ],
        ];

        $this->assertEquals(
            $expectedMenu ,
            $menu
        );
    }

    /**
     * test Encrypt Message
     *
     */
    public function testXSignatureGeneration() {
        $container = $this->unitTests->getContainer();
        $clientSystemsManager = $container->get('AppBundle.ClientSystemsManager');

        $message = 'Test 1"23';

        // test with all our client systems (1-4)
        for($clientSystemsId = 1 ; $clientSystemsId <=4 ; $clientSystemsId ++) {
            $privateKey = $container->getParameter('private_key_Test_' . $clientSystemsId);

            // Create X-Signature as it should be done on the client server
            // To send a message on the client server, you should copy function
            // AppBundle\Manager\Manager\EntityManager::createXSignature()
            $xSignature = $clientSystemsManager->createXSignature($message, $privateKey);
            
            // Verify X-Signature it should be done on this server
            $verification = $clientSystemsManager->verifyXSignature($message, $xSignature, $clientSystemsId);

            $this->assertEquals(
                true ,
                $verification,
                'Problem with clientSystemsId ' . $clientSystemsId
            );
            $wrongSignature = 'sdfsdfsd';
            $verification = $clientSystemsManager->verifyXSignature($message, $wrongSignature, $clientSystemsId);
            $this->assertEquals(
                false ,
                $verification,
                'Problem with clientSystemsId ' . $clientSystemsId
            );
        }


    }





}
