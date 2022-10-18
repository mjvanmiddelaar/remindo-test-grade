<?php

class PearsonValueCalculatorTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @dataProvider provideValidValues
     * @return void
     */
    public function testValidValues($questionRatios, $testRatios, $result)
    {
        $calculator = new \App\Calculator\PearsonValueCalculator();
        $this->assertSame($result, $calculator->calculate($questionRatios, $testRatios));
    }

    public function provideValidValues(): array
    {
        return [
            [[1, 10, 100, 4, 5, 6], [99, 65, 79, 75, 87, 82], -0.15780631136312714]
        ];
    }


}
