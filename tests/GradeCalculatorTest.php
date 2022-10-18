<?php

use PHPUnit\Framework\TestCase;

class GradeCalculatorTest extends TestCase
{

    /**
     * @dataProvider provideValidScores
     */
    public function testValidRatio($score, $maxScore, $grade): void
    {
        $calculator = new \App\Calculator\GradeCalculator();

        $this->assertSame($grade, $calculator->calculate($score, $maxScore));
    }

    /**
     * @dataProvider provideInvalidScores
     */
    public function testInvalidRatio($score, $maxScore): void
    {
        $calculator = new \App\Calculator\GradeCalculator();

        $this->expectExceptionMessage("Invalid ratio");

        $calculator->calculate($score, $maxScore);
    }

    public function provideInvalidScores(): array
    {
        return [
            [100, 80],
            [-10, 100],
            [10, -100],
            [-10, -100],
        ];
    }


    public function provideValidScores(): array
    {
        return [
            [0, 100, 1.0],
            [5, 100, 1.0],
            [10, 100, 1.0],
            [15, 100, 1.0],
            [20, 100, 1.0],
            [25, 100, 1.5],
            [30, 100, 1.9],
            [35, 100, 2.4],
            [40, 100, 2.8],
            [45, 100, 3.3],
            [50, 100, 3.7],
            [55, 100, 4.2],
            [60, 100, 4.6],
            [65, 100, 5.1],
            [69, 100, 5.4],
            [70, 100, 5.5],
            [705, 1000, 5.6],
            [71, 100, 5.7],
            [75, 100, 6.3],
            [80, 100, 7.0],
            [85, 100, 7.8],
            [90, 100, 8.5],
            [95, 100, 9.3],
            [100, 100, 10.0],
        ];
    }

}
