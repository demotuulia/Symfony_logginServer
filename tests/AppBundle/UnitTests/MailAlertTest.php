<?php
/**
 * This class is used to test manager and entity for table 'mail_alert'
 *
 */
namespace Tests\AppBundle\UnitTests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use AppBundle\Manager\Manager\UnitTests;

class MailAlertTest extends WebTestCase
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
     * Test Mail Alert Manager
     *
     * Here we test by getting one alert by id
     */
    public function testGetById()
    {
        $mailAlertManager = $this->unitTests->getContainer()->get('AppBundle.MailAlert');
        // Set current alert to ID 1
        $mailAlertManager->set('id', 1);
        $alert = $mailAlertManager->getCurrentAlert();
        
        //
        // Check that we get correct filters
        //

        $expectedFilters = [
             [
                  'mailAlertFilterId' => 1,
                  'mailAlertId' => 1,
                  'filterField' => 'system',
                  'operator' => '=',
                  'value' => 1,
                 'valueLabbel' => 'Test 1'
            ],
             [
                  'mailAlertFilterId' => 2,
                  'mailAlertId' => 1,
                  'filterField' => 'type',
                  'operator' => '=',
                  'value' => '2',
                 'valueLabbel' => 'Security'
            ],
            [
                'mailAlertFilterId' => 3,
                'mailAlertId' => 1,
                'filterField' => 'level',
                'operator' => '=',
                'value' => '1',
                'valueLabbel' => 'Error'
            ],
        ];

        $this->assertEquals(
            $expectedFilters,
            $alert['filters'],
            'Filters are not correct'
        );



    }
    



}
