<?php

namespace App\Calculator;

use App\DataModel\RemindoTestExamQuestion;
use App\DataModel\RemindoTestExamStudentResult;

class GradeCalculator
{

    /**
     * @param int $score
     * @param int $maxScore
     * @return float
     */
    public function calculate(int $score, int $maxScore): float
    {
        $ratio = $score / $maxScore;
        if ($score < 0 || $maxScore < 0 || $ratio < 0 || $ratio > 1) {
            throw new \RuntimeException("Invalid ratio");
        }
        if ($ratio <= 0.2) {
            return 1.0;
        }
        if ($ratio <= 0.7) {
            return round(1 + ($ratio - 0.2) * (1 / 0.5) * 4.5, 1);
        }
        return round(5.5 + ($ratio - 0.7) * (1 / 0.3) * 4.5, 1);

    }

}
