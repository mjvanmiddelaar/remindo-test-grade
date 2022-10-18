<?php

namespace App\DataModel;

class RemindoTestExam
{

    public function __construct(private array $questions = [], private array $studentResults = []) {}

    /**
     * @return RemindoTestExamQuestion[]
     */
    public function getQuestions(): array
    {
        return $this->questions;
    }

    /**
     * @return RemindoTestExamStudentResult[]
     */
    public function getStudentResults(): array
    {
        return $this->studentResults;
    }



}
