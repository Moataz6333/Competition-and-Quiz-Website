<?php

namespace App\Services;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class SpreadsheetService
{
    public function export(array $data, string $filename)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Populate the spreadsheet with data
        foreach ($data as $rowIndex => $row) {
            foreach ($row as $columnIndex => $value) {
                // Column index starts from 'A', so we convert the numeric index to a letter
                $columnLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($columnIndex + 1);
                $cell = $columnLetter . ($rowIndex + 1);
                $sheet->setCellValue($cell, $value);
            }
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save(storage_path("app/public/{$filename}"));
    }
}
