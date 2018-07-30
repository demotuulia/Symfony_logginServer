<?php
 
namespace Tests\AppBundle\Controller;
 
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use AppBundle\Manager\Manager\UnitTests;
 
class usersControllerTest extends WebTestCase
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

        $usersController =  $this->unitTests->getContainer()->get('AppBundle.UsersControllerManager');
        $userId = 1;
        $list = $usersController->getList($userId);
        
        //
        // Check number of records
        //
        $expectedNroOfItems = 2;
        $this->assertEquals (
            $expectedNroOfItems,
            count($list),
            'Number of items is not correct'
        );
 
        //
        // Check second user on the list
        //

        $secondAlert = end($list);

        $expectedSecondAlert = [
            'id' => 2,
            'username' => 'admin',
            'password' => '$2y$12$sBuSBzqLEEAALYB/JcE1I.gZWx1cPUOmDCaSwl5Kd/JDF3NhGUOWG',
            'email' => 'admin_@imotions.nl',
            'isActive' => true,
            'role' => 'ROLE_ADMIN'
        ];

        $this->assertEquals(
            $expectedSecondAlert,
            $secondAlert,
            'Second user  is not correct'
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
        $userid = 2;
        $expectedValues = [
            'id' => $userid,
            'isActive' => true,
            'username' => 'asdsafsf',
            'role' => 's',
            'email' => '223@sdfsdf.nl',
            'submit' => 'true'
        ];




        //
        // Save
        //
        $userManagerController = $this->unitTests->getContainer()->get('AppBundle.UsersControllerManager');
        $result = $userManagerController->postForm($expectedValues);

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
        $userManager = $this->unitTests->getContainer()->get('AppBundle.UserManager');
        $user = current($userManager->find( $userid));

        unset($expectedValues['submit']);
        foreach ($expectedValues as $field => $expectedValue) {
            $this->assertEquals(
                $expectedValue,
                $user->get($field),
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
        // (Note: To insert, no 'userId' is defined)
        //
       
        $expectedValues = [
            'isActive' => true,
            'username' => 'asd22safsf',
            'password' => 'aadadasdsd22safsf',
            'email' => '223@sdfs22df.nl',
            'role' => 'ROLE_ADMIN',
            'submit' => 'true'
        ];

        //
        // Save
        //
        $userManagerController = $this->unitTests->getContainer()->get('AppBundle.UsersControllerManager');
        $result = $userManagerController->postForm($expectedValues);

        // Check saved status in $result
        unset($expectedValues['password']); // We cannot check encrypted password
        $this->assertEquals(
            true,
            isset($result['saved']),
            'Save status not correct'
        );


        //
        // read again from database and check values
        //
        $newId = $result['id'];
        $userManager = $this->unitTests->getContainer()->get('AppBundle.UserManager');
        $user = current($userManager->find( $newId));

        unset($expectedValues['submit']);
        foreach ($expectedValues as $field => $expectedValue) {
            $this->assertEquals(
                $expectedValue,
                $user->get($field),
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

        $userid = 2;
        $userManagerController = $this->unitTests->getContainer()->get('AppBundle.UserManager');
        $userManagerController->delete($userid);

        //
        // check that the item id deleted
        //

        $userManager =  $this->unitTests->getContainer()->get('AppBundle.UserManager');
        $user = current($userManager->find( $userid));
        $expectedEmptyItem = false;

        $this->assertEquals(
            $expectedEmptyItem,
            $user,
            'Filter not deleted from table app_user'
        );

    }



    public function testFormValidation() {

        $cases = $this->getFormValidationUseCases();

        $userManagerController = $this->unitTests->getContainer()->get('AppBundle.UsersControllerManager');
        foreach ($cases as $case) {
            $result = $userManagerController->postForm( $case['values']);

            $this->assertEquals(
                $case['expectedErrors'],
                $result['errors'],
                $case['label']
            );
        }
    }


    /**
     * getFormValidationUseCases
     *
     *
     * @return array
     */
    private function getFormValidationUseCases() {



        return [

            [
                'label' => 'Insert new user with correct fields ',

                'values' => [
                    'isActive' => true,
                    'username' => 'asd22safsf',
                    'password' => 'aadadasdsd22safsf',
                    'email' => '223@sdfs22df.nl',
                    'role' => 'ROLE_ADMIN',
                    'submit' => 'true'
                ],
                'expectedErrors' => []
            ],


            [
                'label' => 'Insert new user with empty fields ',

                'values' => [
                    'role' => '0', // in the form the empty select option is '0'
                    'submit' => 'true'
                ],
                'expectedErrors' => [
                    0 => '\'username\' is required',
                    1 => '\'password\' is required',
                    2 => '\'email\' is required',
                    3 => '\'role\' is required'
                ]
            ],


            [
                'label' => 'Insert new user with existing "username" and "email" ',

                'values' => [
                    'email' => 'tuulia@imotions.nl',
                    'username' => 'admin',
                    'password' => 's',
                    'role' => 'ROLE_ADMIN',
                    'submit' => 'true'
                ],
                'expectedErrors' => [
                    0 => 'Username is already in use',
                    1 => 'Email is already in use'
                ]
            ],


            [
                'label' => 'Uodate user with correct fields ',

                'values' => [
                    'id' => 2,
                    'isActive' => true,
                    'username' => 'asd22safsf',
                    'password' => 'aadadasdsd22safsf',
                    'email' => '223@sdfs22df.nl',
                    'role' => 'ROLE_ADMIN',
                    'submit' => 'true'
                ],
                'expectedErrors' => []
            ],

            [
                'label' => 'Update user with empty fields ',

                'values' => [
                    'id' => 2,
                    'role' => '0', // in the form the empty select option is '0'
                    'submit' => 'true'
                ],
                'expectedErrors' => [
                    0 => '\'username\' is required',
                    2 => '\'email\' is required',
                    3 => '\'role\' is required'
                ]
            ],


            [
                'label' => 'Update user with existing "username" and "email" ',

                'values' => [
                    'id' => 2,
                    'email' => 'tuulia@imotions.nl',
                    'username' => 'admin',
                    'password' => 's',
                    'role' => 'ROLE_ADMIN',
                    'submit' => 'true'
                ],
                'expectedErrors' => []
            ]
        ];
    }
}
