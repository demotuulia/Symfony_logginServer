<?php
/**
 * This class is used to test menu(s)
 *
 */
namespace Tests\AppBundle\UnitTests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use AppBundle\Entity\ClientSystems;
use AppBundle\Manager\Manager\UnitTests;

class RolesTest extends WebTestCase
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
     * Test that correct menu is rendered for the defined roles on define page (route)
     *
     */
    public function testRoles() {

        $rolesManager = $this->unitTests->getContainer()->get('AppBundle.RolesManager');
        $rolesMenu = $rolesManager->getMenu();
        $expected = [
            0 => [
                    'name' => 'Admin',
                    'value' => 'ROLE_ADMIN',
            ],
            1 => [
                    'name' => 'User',
                    'value' => 'ROLE_USER',
            ],
        ];


            $this->assertEquals(
                $expected ,
                $rolesMenu
            );
        }
    
    
}
