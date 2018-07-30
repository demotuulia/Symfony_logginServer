<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use AppBundle\Manager\Manager\UnitTests;

class logLevelsControllerTest extends WebTestCase
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
     * Test to get list for the logLevel in table app_logLevel
     *
     */
    public function testGetList()
    {

        $logListManager = $this->unitTests->getContainer()->get('AppBundle.LogLevelsControllerManager');
        $list = $logListManager->getList();

        //
        // Check number of records
        //
        $expectedNroOfItems = 3;
        $this->assertEquals(
            $expectedNroOfItems,
            count($list),
            'Number of items is not correct'
        );

    }



    /**
     * Test save
     *
     */
    public function testSave()  {


        //
        // Define data to save is it would be in a posted form
        //
        $id = 2;
        $expectedValues = [
            'id' => $id,
            'name' => 'Te223tx',
            'submit' => 'ok'
        ];

        //
        // Save
        //
        $logLevelManagerController = $this->unitTests->getContainer()->get('AppBundle.LogLevelsControllerManager');
        $result = $logLevelManagerController->postForm($expectedValues);


        // After saving we use the encrypted password:

        // Check saved status in $result
        $this->assertEquals(
            true,
            isset($result['saved']),
            'Save status not correct'
        );

        //
        // read again from database and check values
        //
        $logLevelManager = $this->unitTests->getContainer()->get('AppBundle.LogsLevelsManager');
        $logLevel = current($logLevelManager->find( $id));

        unset($expectedValues['submit']);
        foreach ($expectedValues as $field => $expectedValue) {
            $this->assertEquals(
                $expectedValue,
                $logLevel->get($field),
                'Field ' . $field . ' not saved correctly'
            );
        }
    }



    /**
     * Test insert a new item
     *
     */
    public function testInsert() {

        //
        // Define data to save is it would be in a posted form
        // (Note: To insert, no 'lId' is defined)
        //

        $expectedValues = [
            'name' => 'Test insert',
            'submit' => 'true'
        ];

        //
        // Save
        //
        $logLevelManagerController = $this->unitTests->getContainer()->get('AppBundle.LogLevelsControllerManager');
        $result = $logLevelManagerController->postForm($expectedValues);

        // Check saved status in $result
        $this->assertEquals(
            true,
            isset($result['saved']),
            'Save status not correct'
        );


        //
        // read again from database and check values
        //
        $newId = $result['id'];
        $logLevelManager = $this->unitTests->getContainer()->get('AppBundle.LogsLevelsManager');
        $logLevel = current($logLevelManager->find( $newId));

        unset($expectedValues['submit']);
        foreach ($expectedValues as $field => $expectedValue) {
            $this->assertEquals(
                $expectedValue,
                $logLevel->get($field),
                'Field ' . $field . ' not saved correctly'
            );
        }
    }




}