<?php

class AverageScoreForQuestionCalculatorTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @dataProvider provideValues
     * @param $scores
     * @param $maxScore
     * @param $result
     * @return void
     */
    public function testCalculation($scores, $maxScore, $result): void
    {
        $calculator = new \App\Calculator\AverageScoreForQuestionCalculator();
        $this->assertSame($result,$calculator->calculate($scores,$maxScore));
    }

    public function provideValues(): array
    {
        return [
            [[0,5,10],10,0.5],
            [[0,1,2],10,0.1],
            [[1,1,1],10,0.1],
            [[10,10,10],10,1],
        ];
    }
}
