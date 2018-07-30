<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use AppBundle\Entity\ClientSystems;
use AppBundle\Manager\Manager\UnitTests;

class LogsListControllerTest extends WebTestCase
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
     * Test list
     *
     *
     * We test that the filetring and ordering if correct.
     *
     *  Our test should build a SQL query as below:
     *
     * SELECT
     *  LOGS.logid AS logid_0,
     *  LOGS.level AS level_1,
     *  LOGS.type AS type_2,
     *  LOGS.client_systems_id AS client_systems_id_3,
     *  LOGS.message AS message_4,
     *  LOGS.timestamp AS timestamp_5,
     *  SYSTEMS.name AS name_6
     * FROM logs LOGS
     * LEFT JOIN client_systems SYSTEMS ON (SYSTEMS.client_systems_id = LOGS.client_systems_id)
     * WHERE 1 = 1
     * AND LOGS.timestamp >= '2016-07-20'
     * AND LOGS.timestamp <= '2016-07-27'
     * AND SYSTEMS.name = 'Test 2'
     * ORDER BY LOGS.type ASC, LOGS.level DESC
     */
    public function testList(){

        $logManager = $this->unitTests->getContainer()->get('AppBundle.LogsManager');
        $systemName = 'Test 2';

        $filters = [
            [ 'field' => 'L.timestamp', 'operator' => '>=', 'value' => '2016-07-20' ],
            [ 'field' => 'L.timestamp', 'operator' => '<=', 'value' => '2016-07-27' ],
            [ 'field' => 'S.name',      'operator' => '=',  'value' => $systemName ],
        ];

        $sort = [
            ['field' => 'L.type', 'dir' => 'ASC'],
            ['field' => 'L.level', 'dir' => 'DESC'],
        ];

        $result = $logManager->getLogsList($filters, $sort);
        $items = $result->list;

        // Check amount
        $expectedAmount = 12;
        $this->assertEquals( $expectedAmount , count($items), 'Amount does not match ');
        
        // Check that the array is correctly sorted. We check some LogIds
        $orderCheck  = [
            ['order' => 0, 'logId'  => 18],
            ['order' => 1, 'logId'  => 4],
            ['order' => 11, 'logId' => 20]
        ];

        foreach ($orderCheck as $case) {
            $expectedLogId = $case['logId'];
            $itemLogId =  $items[$case['order']]['logid'];
            $this->assertEquals(
                $expectedLogId,
                $itemLogId,
                'Ordering not correct '
            );
        }

        // Check that we only have items from system 'Test 2'
        foreach ($items as $item) {
            $this->assertEquals(
                $systemName ,
                $item['name'],
                'Filtering not correct. All itmes should have system ' . $systemName
            );
        }
        
    }


    /**
     * Test pagination
     *
     * In the current system we have 43 items.
     *
     * 
     * This test should build following query:
     * 
     * SELECT
     *   LOGS.logid AS logid_0,
     *   LOGS.level AS level_1,
     *   LOGS.type AS type_2,
     *   LOGS.client_systems_id AS client_systems_id_3,
     *   LOGS.message AS message_4,
     *   LOGS.timestamp AS timestamp_5,
     *   LOGS.logid AS logid_6,
     *   LOGS.level AS level_7,
     *   LOGS.type AS type_8,
     *   LOGS.message AS message_9,
     *   LOGS.timestamp AS timestamp_10,
     *   LOGS.client_systems_id AS client_systems_id_11,
     *   SYSTEMS.name AS name_12
     * FROM logs LOGS
     * LEFT JOIN client_systems SYSTEMS ON (SYSTEMS.client_systems_id = LOGS.client_systems_id)
     * WHERE 1 = 1
     * LIMIT 20 OFFSET 40
     * 
     * 
     */
    public function testListPagination() {
        $logManager = $this->unitTests->getContainer()->get('AppBundle.LogsManager');
        
        $page = 5;
        $maxItemsPerPage = 10;
        $result = $logManager->getLogsList([], [], $page, $maxItemsPerPage);
        $items = $result->list;

        // Check amounts
        $expectedAmountOnThisPage = 3;
        $this->assertEquals( $expectedAmountOnThisPage , count($items), 'Amount on page  does not match ');
        $expectedTotalAmount = 43;
        $this->assertEquals( $expectedTotalAmount , $result->totalRecords, 'Total amount  of records does not match ');
        $expectedpageAmount = 5;
        $this->assertEquals( $expectedpageAmount , $result->totalPages, 'Total amount  of pages does not match ');
        
    }
}
