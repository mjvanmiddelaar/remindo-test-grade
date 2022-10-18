<?php

namespace App\Calculator;

use App\DataModel\RemindoTestExamQuestion;
use App\DataModel\RemindoTestExamStudentResult;

class AverageScoreForQuestionCalculator
{

    /**
     * @param array $resultScores
     * @param int $maxScore
     * @return float|int
     */
    public function calculate(array $resultScores, int $maxScore): float|int
    {
        return array_sum($resultScores) / (count($resultScores) * $maxScore);
    }

}
