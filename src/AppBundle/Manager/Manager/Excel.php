<?php
/**
 * A class to export data to Excel
 *
 */
namespace AppBundle\Manager\Manager;

use AppBundle\Manager\Manager;
use PHPExcel;
use PHPExcel_IOFactory;


final class Excel extends Manager {


    /**
     * Memeber to keep the excel to export
     *
     * @var PHPExcel
     */
    private $phpOb;

    /**
     * Headers of the current sheet
     *
     * @var array
     */
    private $headersOfCurrentSheet = [];

    /**
     * Prepare export to excel with given values.
     *
     * Example of Sheets
     *
     * $sheets = [
     *  [
     *     0 => [
     *              'title' => 'Example sheet 1'
     *              'headers' => [
     *                      'test1' => 'Test 1', 
     *                      'test2' => 'Test 2', 
     *                      'test3' => 'Test 3'
     *              ],
     *              'rows => [
     *                  [
     *                      'test1' => 123, 
     *                      'test2' => 343, 
     *                      'test3' => 234
     *                  ],
     *                   [
     *                      'test1' => 233,
     *                      'test2' => 32233,
     *                      'test3' => 22334
     *                  ],
     *                   [
     *                      'test1' => 12323,
     *                      'test2' => 34543,
     *                      'test3' => 2354
     *                  ],
     *              ]
     *      ],
     *
     *      1 => [
     *              'title' => 'Example sheet 2'
     *             'headers' => [
     *                      'test4' => 'Test 4',
     *                      'test5' => 'Test 5',
     *                      'test6' => 'Test 6'
     *              ],
     *              'rows => [
     *                  [
     *                      'test4' => 123,
     *                      'test5' => 343,
     *                      'test6' => 234
     *                  ],
     *                   [
     *                      'test4' => 233,
     *                      'test5' => 32233,
     *                      'test6' => 22334
     *                  ],
     *              ],
     *
     * ]
     * @param string    $title      Title of the excel
     * @param array     $sheets     Sheets, See example above
     */
    public function prepare($title, $sheets) {
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()
            ->setTitle($title)
            ->setSubject($title);
        $this->setSheets($sheets, $objPHPExcel);
        
        $this->phpOb = $objPHPExcel;
    }


    /**
     * set Sheets
     *
     * A sub function of 'export'
     *
     * @param array     $sheets
     * @param PHPExcel  $objPHPExcel
     */
    private function setSheets($sheets, &$objPHPExcel) {
        if (empty($sheets)) {
            return;
        }

        $sheetNro = 0;
        foreach ($sheets as $sheet) {
            if ( $sheetNro) {
                $objWorkSheet = $objPHPExcel->createSheet();
                $objPHPExcel->addSheet($objWorkSheet);
            }

            $excelSheet = $objPHPExcel->getActiveSheet();
            $excelSheet->setTitle($sheet['title']);

            $this->headersOfCurrentSheet = $sheet['headers'];
            $rowNro = 1;
            array_walk (
                $sheet['rows'],
                function ($row) use ($excelSheet, &$rowNro) {
                    $this->setRow($row, $excelSheet, $rowNro);
                    $rowNro ++;
                }
            );
            $sheetNro ++;
        }
    }


    /**
     * setRow
     *
     *  A sub function of  'setSheets'
     *
     * @param array                 $row
     * @param PHPExcel_Worksheet    $excelSheet
     * @param integer               $rowNro
     */
    private function setRow($row, &$excelSheet, $rowNro) {
        $colNro = 1; 
        foreach (array_keys($this->headersOfCurrentSheet) as $columnName ) {
            if (isset($row[$columnName])) {
                $excelSheet->setCellValueByColumnAndRow($colNro, $rowNro, $row[$columnName]);
            }
            $colNro++;
        }
    }


    /**
     * Render
     *
     * Render excel from the object $this->phpOb prepared by the function
     * $this->prepare
     */
    public function render() {
        $objWriter = PHPExcel_IOFactory::createWriter($this->phpOb, 'Excel5');
        $objWriter->save('php://output');
    }

}