<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use AppBundle\Manager\Manager\UnitTests;

class logLevelsTest extends WebTestCase
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
     * Test manager AppBundle.LogsLevelsManager
     *
     */
    public function testLogsLevelsManager() {

        $container = $this->unitTests->getContainer();
        $logLevelManager = $container->get('AppBundle.LogsLevelsManager');

        //
        // test get
        //
        $item = $logLevelManager->find(3);

        $expectedName = 'Notice';
        $this->assertEquals(
            $expectedName ,
            current($item)->get('name'),
            'Name of the third item in table  logs_levels does not match with ' . $expectedName
        );

        //
        // test insert
        //
        $name = substr('Test ' . uniqid(), 0 , 10);


        $data = [
            'name' => $name
        ];
        $newId = $logLevelManager->save($data);

        $this->assertEquals(
            true ,
            $newId > 0 ,
            'Item not inserted.'
        );

        //
        // Check that the values of inserted item are correct
        //
        $newItem = current($logLevelManager->find($newId));
        $this->assertEquals(
            $name ,
            $newItem->get('name'),
            'Item not correctly inserted'
        );

        //
        // Test update
        //
        $name = substr('Test ' . uniqid(), 0 , 10);

        $data = [
            'id' => $newId,
            'name' => $name
        ];
        $newId = $logLevelManager->save($data);

        //
        // Check that the values of inserted item are correct
        //
        $newItem = current($logLevelManager->find($newId));
        $this->assertEquals(
            $name ,
            $newItem->get('name'),
            'Item not correctly saved'
        );

        //
        // Test delete
        //
        $logLevelManager->delete($newId);
        $newItem = current($logLevelManager->find($newId));
        $this->assertEquals(
            false ,
            $newItem,
            'Item deleted'
        );
    }

    /**
     * Test get menu
     *
     */
    public function testLogLevelMenu()
    {

        $container = $this->unitTests->getContainer();
        $logLevelManager = $container->get('AppBundle.LogsLevelsManager');

        $menu = $logLevelManager->getMenu();

        $expectedMenu = [
            0 =>
                [
                    'name' => 'Error',
                    'value' => 1,
                ],
            1 =>
                [
                    'name' => 'Notice',
                    'value' => 3,
                ],
            2 =>
                [
                    'name' => 'Warn',
                    'value' => 2,
                ],
        ];

        $this->assertEquals(
            $expectedMenu ,
            $menu
        );
    }
}