<?php
 
namespace Tests\AppBundle\Controller;
 
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use AppBundle\Entity\ClientSystems;
use AppBundle\Manager\Manager\UnitTests;
 
class MailAlertsControllerTest extends WebTestCase
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
     * Test to get list for the user in table app_user
     *
     */
    public function testGetList() {

        $mailAlertsController =  $this->unitTests->getContainer()->get('AppBundle.MailAlertsController');
        $userId = 1;
        $list = $mailAlertsController->getList($userId);

        //
        // Check number of records
        //
        $expectedNroOfItems = 2;
        $this->assertEquals(
            $expectedNroOfItems,
            $list->totalRecords,
            'Number of items is not correct'
        );
 
        //
        // Check number of pages
        //
        $expectedNroOfPages = 1;
        $this->assertEquals(
            $expectedNroOfPages,
            $list->totalPages,
            'Number of pages is not correct'
        );
 
 
        //
        // Check second alert on the list
        //

        $secondAlert =end($list->list);

        $expectedSecondAlert = [
            'mailAlertId' => 2,
            'active' => true,
            'appUserId' => 1,
            'filters' => [
                        'mailAlertId' => 2,
                        'active' => true,
                        'appUserId' => 1,
                        'filters' => [
                                0 => [
                                        'mailAlertFilterId' => 4,
                                        'mailAlertId' => 2,
                                        'filterField' => 'system',
                                        'operator' => '=',
                                        'value' => 2,
                                        'valueLabbel' => 'Test 2'
                                    ],
                                1 => [
                                        'mailAlertFilterId' => 5,
                                        'mailAlertId' => 2,
                                        'filterField' => 'type',
                                        'operator' => '=',
                                        'value' => '1',
                                        'valueLabbel' => 'Application'
                                    ],
                                2 => [
                                        'mailAlertFilterId' => 6,
                                        'mailAlertId' => 2,
                                        'filterField' => 'level',
                                        'operator' => '=',
                                        'value' => '1',
                                        'valueLabbel' => 'Error'
                                    ],
                            ],
                    ],
            ];

        $this->assertEquals(
            $expectedSecondAlert,
            $secondAlert,
            'Second alert  is not correct'
        );
    }
 
 
    /**
     * Test save
     *
     */
    public function testSave() {
 
        //
        // Define data to save is it would be in a posted form
        //
        $alertId = 2;
        $expectedValues = [
            'mailAlertId' => $alertId,
            'active' => true,
            'system' => 3,
            'type' => 2,
            'level' => 2,
            'submit' => ''
        ];

        //
        // Save
        //
        $mailAlertManagerController = $this->unitTests->getContainer()->get('AppBundle.MailAlertsController');
        $result = $mailAlertManagerController->postForm($expectedValues);

        // Check saved status in $result
        $this->assertEquals(
            true,
            isset($result['saved']),
            'Save status not correct'
        );

        //
        // read again from database and check values
        //
        $mailAlertManager = $this->unitTests->getContainer()->get('AppBundle.MailAlert');
        $mailAlertManager->set('id', $alertId);
        foreach ($expectedValues as $field => $expectedValue) {
            $this->assertEquals(
                $expectedValue,
                $mailAlertManager->get($field),
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
        // (Note: To insert, no 'mailAlertId' is defined)
        //
       
        $expectedValues = [
            'appUserId' => 2,
            'active' => true,
            'type' => 3,
            'level' => 2,
            'system' => 3,
            'submit' => ''
        ];

        $mailAlertManagerController = $this->unitTests->getContainer()->get('AppBundle.MailAlertsController');
        $result = $mailAlertManagerController->postForm($expectedValues);
        $newId = $result['id'];

        // Check saved status in $result
        $this->assertEquals(
            true,
            isset($result['saved']),
            'Save status not correct'
        );
       
        //
        // read again from database and check values
        //
        $mailAlertManager = $this->unitTests->getContainer()->get('AppBundle.MailAlert');
        $mailAlertManager->set('id', $newId);
        foreach ($expectedValues as $field => $expectedValue) {
            $this->assertEquals(
                $expectedValue,
                $mailAlertManager->get($field),
                'Field ' . $field . ' not saved correctly'
            );
        }
    }







    /**
     * testDelete
     * 
     */
    public function testDelete() {

        //
        // delete
        //
        $alertId = 2;
        $mailAlertManagerController = $this->unitTests->getContainer()->get('AppBundle.MailAlertsController');
        $mailAlertManagerController->delete($alertId);

        //
        // check that the item and all filters are deleted
        //

        // check table mail_alert
        $mailAlertManager =  $this->unitTests->getContainer()->get('AppBundle.MailAlert');
        $expectedEmptyItem = [];
        $mailAlertManager->set('id', $alertId);
        $alert =  $mailAlertManager->getCurrentAlert();

        $this->assertEquals(
            $expectedEmptyItem,
            $alert,
            'Filter not deleted from table mail_alert'
        );

        // check table mail_alert_filter
        $mailAlertManagerFilter =  $this->unitTests->getContainer()->get('AppBundle.MailAlertFilter');
        $filters = $mailAlertManagerFilter->find($alertId, 'mailAlertId');
        $expectedEmptyItem = [];
        $mailAlertManager->set('id', $alertId);

        $this->assertEquals(
            $expectedEmptyItem,
            $filters,
            'Filters not deleted from table mail_alert_filters'
        );

    }
}
