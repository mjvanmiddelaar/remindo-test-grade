<?php

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class WorksheetReaderTest extends \PHPUnit\Framework\TestCase
{

    public Xlsx $reader;
    public string $path;

    protected function setUp(): void
    {
        $this->reader = new PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $this->path = __DIR__ . '/data';
        parent::setUp();
    }


    /**
     * @dataProvider provideValidSpreadsheets
     * @return void
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     */
    public function testReadValidWorksheets($filePath, $questionCount, $studentCount, $questions, $students)
    {
        $reader = new \App\Reader\WorksheetReader();
        $sheet = $this->reader->load(sprintf("%s/%s", $this->path, $filePath));
        $exam = $reader->read($sheet->getActiveSheet());

        $this->assertCount($questionCount, $exam->getQuestions(), "Count the number of questions correctly");
        $this->assertSame($questions[0][0], $exam->getQuestions()[0]->getName(), "Question name correct");
        $this->assertSame($questions[0][1], $exam->getQuestions()[0]->getMaxScore(), "Max score correct");
        $this->assertCount($studentCount, $exam->getStudentResults(), "Count the number of students correctly");
        $this->assertSame($students[0][0], $exam->getStudentResults()[0]->getName(), "Student name correct");
        $this->assertSame($students[0][1], $exam->getStudentResults()[0]->getResults(), "Student results correct");
    }

    public function provideValidSpreadsheets(): array
    {
        return [
            ['OneQuestionOneStudentValid.xlsx', 1, 1, [['Score Question 1', 95]], [['Student 0001', [0 => 37]]]],
            ['ThreeQuestionsThreeStudentsValid.xlsx', 3, 3, [['Score Question 1', 95]], [['Maarten', [0 => 37, 1 => 11, 2 => 1]]]],
            ['Assignment.xlsx', 49, 452, [['Score Question 1', 1]], [['Student 0001', [0 => 1,
                1 => 1,
                2 => 0,
                3 => 1,
                4 => 1,
                5 => 0,
                6 => 1,
                7 => 0,
                8 => 0,
                9 => 0,
                10 => 0,
                11 => 0,
                12 => 0,
                13 => 0,
                14 => 1,
                15 => 0,
                16 => 1,
                17 => 0,
                18 => 1,
                19 => 0,
                20 => 0,
                21 => 1,
                22 => 1,
                23 => 1,
                24 => 0,
                25 => 1,
                26 => 0,
                27 => 1,
                28 => 1,
                29 => 1,
                30 => 1,
                31 => 2,
                32 => 1,
                33 => 0,
                34 => 2,
                35 => 2,
                36 => 2,
                37 => 1,
                38 => 0,
                39 => 1,
                40 => 3,
                41 => 5,
                42 => 0,
                43 => 0,
                44 => 3,
                45 => 1,
                46 => 1,
                47 => 0,
                48 => 0]]]]
        ];
    }


}
