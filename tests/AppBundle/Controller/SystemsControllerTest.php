<?php
 
namespace Tests\AppBundle\Controller;
 
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use AppBundle\Manager\Manager\UnitTests;
 
class systemsControllerTest extends WebTestCase
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
     * Test to get list for the system in table app_system
     *
     */
    public function testGetList() {

        $systemsController =  $this->unitTests->getContainer()->get('AppBundle.SystemsControllerManager');
        $systemId = 1;
        $list = $systemsController->getList($systemId);

        //
        // Check number of records
        //
        $expectedNroOfItems = 4;
        $this->assertEquals (
            $expectedNroOfItems,
            count($list),
            'Number of items is not correct'
        );
 
        //
        // Check second system on the list
        //

        $secondAlert = end($list);

        $expectedSecondAlert = [
            'systemid' => 4,
            'name' => 'Test 4',
            'apikey' => '23234ffff23sf',
            'pubkey' => '-----BEGIN PUBLIC KEY-----
MIICIjANBgkqhkiG9w0BAQEFAAOCAg8AMIICCgKCAgEAupZvgbA8otQag/tB9aPl
b5kWTMe/CyZxEql0/j3noJgitUM0cQ49qCxICxN58J+PzX1WoID3pn9pupmu7SS0
mbYga1VsaxFUDYO4JY9BF8ldg9q3yndtKoR/y4eDD3eC4q6Dhi13KSdZrCbADjds
T/b545RDJ+/FHiFk+APPoTaXtUtkp24KBS6tiDnO/ZvGkFvB2UsMuSAjq+6zHbpf
x3NA7tmS2DX3ZTNBMiFWLL8fsiEf5H8r6usUN+QE6FJua41xWqT1ZthPzX3RYjZZ
KgG0Wql5xSMk/POHCoD/oB3wznIRnhYgeQegCN7nQjuPgh+GTUkuXPShKTTRvSSl
EWitizUIfp9aYx2gqYHH2uLUiiwekB79kgftwRhb4gI2d567wvhNRK+mBuZUBl4P
cvabkw72UJryrirc94FT/AChV/f9JdnG6EzDo2W26trylyTTRQ9988OZbT9JRrah
4glr+E53td2+9lB4TCUCqnxEy1wuoUbWOkVlP+vS0Thrcomapw2YZiH0Kg83GyVJ
/9I35E/dlJHEx+2E/dRUuyHnGF4Usj0xkQ9ww7Y8kN/j8x4PG8P6aP8bzzu81NXN
sjUVEray9KJT7kOd8ePKBijX+LS5EXJHjU/ZQ6ZX7X3LWXHXd+3wSSV8qWwtw05b
K2/3RTuNRalcwCYQL35SepcCAwEAAQ==
-----END PUBLIC KEY-----'
        ];

        $this->assertEquals(
            $expectedSecondAlert,
            $secondAlert,
            'Second system  is not correct'
        );
        
    }
 
 
    /**
     * Test save
     *
     */
    public function testSave()  {
        return; // test !!!

        //
        // Define data to save is it would be in a posted form
        //
        $systemid = 2;
        $expectedValues = [
            'systemid' => $systemid,
            'name' => 'Test xxx',
            'apikey' => 'test 3edcdfg',
            'pubkey' => 'test 4fffd',
            'submit' => 'true'
        ];




        //
        // Save
        //
        $systemManagerController = $this->unitTests->getContainer()->get('AppBundle.SystemsControllerManager');
        $result = $systemManagerController->postForm($expectedValues);

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
        $systemManager = $this->unitTests->getContainer()->get('AppBundle.ClientSystemsManager');
        $system = current($systemManager->find( $systemid));

        unset($expectedValues['submit']);
        foreach ($expectedValues as $field => $expectedValue) {
            $this->assertEquals(
                $expectedValue,
                $system->get($field),
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
        // (Note: To insert, no 'systemId' is defined)
        //
       
        $expectedValues = [
            'name' => 'Test insert',
            'apikey' => 'test insert 333',
            'pubkey' => 'test insert 4fffd',
            'submit' => 'true'
        ];

        //
        // Save
        //
        $systemManagerController = $this->unitTests->getContainer()->get('AppBundle.SystemsControllerManager');
        $result = $systemManagerController->postForm($expectedValues);

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
        $systemManager = $this->unitTests->getContainer()->get('AppBundle.ClientSystemsManager');
        $system = current($systemManager->find( $newId));

        unset($expectedValues['submit']);
        foreach ($expectedValues as $field => $expectedValue) {
            $this->assertEquals(
                $expectedValue,
                $system->get($field),
                'Field ' . $field . ' not saved correctly'
            );
        }
    }



    /**
     * testDelete
     * 
     */
    public function testDelete()  {
        return; // test !!!
        //
        // delete
        //

        $systemid = 2;
        $systemManagerController = $this->unitTests->getContainer()->get('AppBundle.ClientSystemsManager');
        $systemManagerController->delete($systemid);

        //
        // check that the item id deleted
        //

        $systemManager =  $this->unitTests->getContainer()->get('AppBundle.ClientSystemsManager');
        $system = current($systemManager->find( $systemid));
        $expectedEmptyItem = false;

        $this->assertEquals(
            $expectedEmptyItem,
            $system,
            'Filter not deleted from table app_system'
        );

    }



    public function testFormValidation() {

        $cases = $this->getFormValidationUseCases();

        $systemManagerController = $this->unitTests->getContainer()->get('AppBundle.SystemsControllerManager');
        foreach ($cases as $case) {
            $result = $systemManagerController->postForm( $case['values']);

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
                'label' => 'Insert new system with correct fields ',

                'values' => [
                    'name' => 'Test insert',
                    'apikey' => 'test insert 333',
                    'pubkey' => 'test insert 4fffd',
                    'submit' => 'true'
                ],
                'expectedErrors' => []
            ],

            [
                'label' => 'Insert new system with empty fields ',

                'values' => [
                    'submit' => 'true'
                ],
                'expectedErrors' => [
                    0 => '\'name\' is required',
                    1 => '\'apikey\' is required',
                    2 => '\'pubkey\' is required',
                ]
            ],

            
            [
                'label' => 'Insert new system with existing "name" and "apikey" and "pubkey" ',

                'values' => [
                    'name' => 'Test 1',
                    'apikey' => '234324dsf23sf',
                    'pubkey' => '-----BEGIN PUBLIC KEY-----
MIICIjANBgkqhkiG9w0BAQEFAAOCAg8AMIICCgKCAgEA0xIfYHx0OfWfN4PWtRY5
iwp1sUjc1aXgryNCF3HnfqYSS3Mur0XgvtbDcgXtUU1qtdhiwT2+oY8f1a5Kup44
cXQotFMAaz342BhTIczpu64uISRv+t7FkX6v0UfVfz2B7snIboSFfuayGuZljvjK
VCKPM+dgsyjjMipebGGRxB4E+mVEt0LvScanDprDv9h4RDlSRFMVXw9qv6Z27pQM
xmZMsjzMk23xbHRu5CKkEWTUBjWqJ9t1c3O5M4IC2/NC4n9AiwvdJe4W3yUFVEMt
xN3WH17JEhOJ9LVhZVOOuPHEr7gkDWgLcyRwpNcRQSQL6Gak7SnE0uqI1fPUwfRo
6kiJOpKj9ax4q9spyD5aKt0mlVN8U3aMXpVALMfIRT4zy43KZPsqBUy5IB5+WPO1
lsIkMx1Md7lPEzN0bOapZaJVScTZ67r8brA3PicpmmqW8nkG39wb+hKqUrpEMo50
pefiGc1mcvslpb2AQnnnm91m4rbbSbjCnlbXermcX/YEr78oqrtNujVCHR2xvvgL
TCvSPRwY9SUbhprMab2pc6MSvFBpaNugS90VS4Qei3Ow6Rx0YYVudRUm2HiZR1v9
lIimm6/v2fADsbJPy60fTscu6iGfo/dKVswxbbmL/d0o4xSFgcUZCUr3Z9c6Rg/c
5pf4Q7Ma7kH7xrYpmAovVFcCAwEAAQ==
-----END PUBLIC KEY-----',
                    'submit' => 'true'
                ],
                'expectedErrors' => [
                    0 => '\'name\' is already in use',
                    1 => '\'apikey\' is already in use',
                    2 => '\'pubkey\' is already in use',
                ]
            ],
            

            [
                'label' => 'Update system with empty fields ',

                'values' => [
                    'systemid' => 2,
                    'submit' => 'true'
                ],
                'expectedErrors' => [
                    0 => '\'name\' is required',
                    1 => '\'apikey\' is required',
                    2 => '\'pubkey\' is required'
                ]
            ],

            
            [
                'label' => 'Update system with existing "name" and "apikey" and "pubkey" ',

                'values' => [
                    'systemid' => 2,
                    'name' => 'Test 2',
                    'apikey' => '234324dsf23sf',
                    'pubkey' => 'ds35345f3234ewr',
                    'submit' => 'true'
                ],
                'expectedErrors' => []
            ]

        ];

    }
}
