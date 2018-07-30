<?php
/**
 * This class is used for gemeric  entities tests
 *
 */
namespace Tests\AppBundle\UnitTests;

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

    
    
}
