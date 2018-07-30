<?php
/**
 * This class teste PHP Excel
 *
 */
namespace Tests\AppBundle\UnitTests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use AppBundle\Entity\ClientSystems;
use AppBundle\Manager\Manager\UnitTests;
use PHPExcel;
use PHPExcel_IOFactory;

class PHPExcelTest extends WebTestCase
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
     * Test that PHP Excell is properly installed. We dont test anything with asserts.
     *
     * Just don't crash
     *
     * Source http://stackoverflow.com/questions/6402839/how-to-use-phpexcel-correctly-with-symfony-2/10206109
     *
     *
     */
    public function testExcel()
    {

        // Create new PHPExcel object
        $objPHPExcel = new PHPExcel();

        // Set document properties
        $objPHPExcel->getProperties()->setCreator("Me")
            ->setLastModifiedBy("Someone")
            ->setTitle("My first demo")
            ->setSubject("Demo Document");
        // Add some data
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Hello')
            ->setCellValue('B2', 'world!')
            ->setCellValue('C1', 'Hello')
            ->setCellValue('D2', 'world!');
        // Set active sheet index to the first sheet
        $objPHPExcel->setActiveSheetIndex(0);

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

    }

}
