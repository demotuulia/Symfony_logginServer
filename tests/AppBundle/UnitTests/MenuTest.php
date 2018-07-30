<?php
/**
 * This class is used to test menu(s)
 *
 */
namespace Tests\AppBundle\UnitTests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use AppBundle\Entity\ClientSystems;
use AppBundle\Manager\Manager\UnitTests;

class MenuTest extends WebTestCase
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
    public function testMenus() {

        $menuManager = $this->unitTests->getContainer()->get('AppBundle.menuManager');
        $cases = [
            [
                'role' => 'ROLE_GUEST',
                'route' => '/login/',
                'expectedMenu' => [
                    0 => [
                            'route' => '/login/',
                            'label' => 'Login',
                            'allowed_roles' => [
                                    0 => 'ROLE_GUEST',
                                ],
                            'activeClass' => 'active',
                    ],
                ]
            ],

            [
                'role' => 'ROLE_ADMIN',
                'route' => '/list/',
                'expectedMenu' => [
                    1 =>
                        [
                            'route' => '/logout/',
                            'label' => 'Logout',
                            'allowed_roles' =>
                                [
                                    0 => 'ROLE_ADMIN',
                                    1 => 'ROLE_USER',
                                ],
                            'activeClass' => ' ',
                        ],
                    2 =>
                        [
                            'route' => '/list/',
                            'label' => 'Log list',
                            'allowed_roles' =>
                                [
                                    0 => 'ROLE_ADMIN',
                                    1 => 'ROLE_USER',
                                ],
                            'activeClass' => 'active',
                        ],
                    3 =>
                        [
                            'route' => '/mailalerts/',
                            'label' => 'Mail alerts',
                            'allowed_roles' =>
                                [
                                    0 => 'ROLE_ADMIN',
                                    1 => 'ROLE_USER',
                                ],
                            'activeClass' => ' ',
                        ],
                    4 =>
                        [
                            'route' => '/systems/',
                            'label' => 'Systems',
                            'allowed_roles' =>
                                [
                                    0 => 'ROLE_ADMIN',
                                ],
                            'activeClass' => ' ',
                        ],
                    5 =>
                        [
                            'route' => '/users/',
                            'label' => 'Users',
                            'allowed_roles' =>
                                [
                                    0 => 'ROLE_ADMIN',
                                ],
                            'activeClass' => ' ',
                        ],
                    6 =>
                        [
                            'route' => '/logslevels/',
                            'label' => 'Log Levels',
                            'allowed_roles' =>
                                [
                                    0 => 'ROLE_ADMIN',
                                ],
                            'activeClass' => ' ',
                        ],
                ]
            ]
    ];

        foreach ($cases as $case) {
            $mainNavigation =$menuManager->getMainNavigation($case);
            $this->assertEquals(
                $case['expectedMenu'] ,
                $mainNavigation,
                'Menu ' . $case['role'] . ' does not match.'
            );
        }
    }

    
    
}
