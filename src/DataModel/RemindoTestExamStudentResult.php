<?php

namespace App\DataModel;

class RemindoTestExamStudentResult
{
    public function __construct(private int $index, private string $name, private array $results, private ?float $grade = null)
    {
    }

    public function getIndex(): int
    {
        return $this->index;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getResults(): array
    {
        return $this->results;
    }

    public function getResult(int $i)
    {
        return $this->results[$i];
    }

    public function getGrade(): float|null
    {
        return $this->grade;
    }

}
