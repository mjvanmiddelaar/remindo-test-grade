<?php

namespace App\Reader;

use App\DataModel\RemindoTestExam;
use App\DataModel\RemindoTestExamQuestion;
use App\DataModel\RemindoTestExamStudentResult;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class WorksheetReader
{

    public function read(Worksheet $worksheet)
    {
        $columns = Coordinate::columnIndexFromString($worksheet->getHighestColumn(1)) - 1;
        $rows = $worksheet->getHighestRow();
        $studentResults = $questions = [];
        for ($j = 0; $j < $columns; $j++) {
            $questionLabel = (string)$worksheet->getCell([$j + 2, 1])->getValue();
            $questionMaxScore = (int)$worksheet->getCell([$j + 2, 2])->getValue();
            $questions[$j] = new RemindoTestExamQuestion($j, $questionLabel, $questionMaxScore);
        }
        for ($i = 0; ($i + 2) < $rows; $i++) {
            $name = $worksheet->getCell([1, $i + 3,]);
            $results = [];
            for ($j = 0; $j < $columns; $j++) {
                $results[$j] = (int)$worksheet->getCell([$j + 2,$i + 3])->getValue();
            }
            $studentResults[$i] = new RemindoTestExamStudentResult($i, $name, $results);
        }

        return new RemindoTestExam($questions, $studentResults);
    }

}
