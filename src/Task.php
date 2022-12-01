<?php

declare(strict_types=1);

namespace App;

abstract class Task
{
    public function __construct(private Input $input)
    {
    }
    protected function getInput(): Input
    {
        return $this->input;
    }

    abstract public function partA(): int;
    abstract public function partB(): int;
}
