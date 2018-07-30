<?php
/**
 * This class is used to test manager and entity for table app_users
 *
 */
namespace Tests\AppBundle\UnitTests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use AppBundle\Manager\Manager\UnitTests;

class AppUsersTest extends WebTestCase
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
     * Test UserManager
     */
    public function testUserManager()
    {
        $userManager = $this->unitTests->getContainer()->get('AppBundle.UserManager');
        $user = $userManager->find('tuulia', 'username');
        $email = current($user)->get('email');
        $expectedEmail = 'tuulia@imotions.nl';
        $this->assertEquals(
            $expectedEmail,
            $email
        );
    }
}
