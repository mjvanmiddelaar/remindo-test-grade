<?php

namespace App\DataModel;

class RemindoTestExamQuestion
{

    public function __construct(private int $index, private string $name, private int $maxScore, private ?float $pValue = null, private ?float $ritValue = null){}

    public function getIndex(): int
    {
        return $this->index;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMaxScore(): int
    {
        return $this->maxScore;
    }

    public function getPValue(): ?float
    {
        return $this->pValue;
    }

    public function setPValue(?float $pValue): void
    {
        $this->pValue = $pValue;
    }

    public function getRitValue(): ?float
    {
        return $this->ritValue;
    }

    public function setRitValue(?float $ritValue): void
    {
        $this->ritValue = $ritValue;
    }


}
