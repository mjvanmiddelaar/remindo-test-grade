<?php

namespace App\Calculator;

use App\DataModel\RemindoTestExamQuestion;
use App\DataModel\RemindoTestExamStudentResult;
use Phpml\Exception\InvalidArgumentException;
use Phpml\Math\Statistic\Correlation;

class PearsonValueCalculator
{

    /**
     * @throws InvalidArgumentException
     */
    public function calculate($questionRatios, $testRatios): float|int
    {
        return Correlation::pearson($questionRatios, $testRatios);
    }

}
