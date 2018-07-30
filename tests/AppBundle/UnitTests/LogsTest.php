<?php
/**
 * This class is used to test manager and entity for table logs
 *
 */
namespace Tests\AppBundle\UnitTests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use AppBundle\Manager\Manager\UnitTests;

class LogsTest extends WebTestCase
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
     * test Entity logs
     *
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
     * Test Log Manager
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




}
