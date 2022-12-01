<?php

declare(strict_types=1);

namespace App;

abstract class Day
{
    public function __construct(private Input $input)
    {
    }
    public function getInput(): Input
    {
        return $this->input;
    }

    abstract public function partA(): int;
    abstract public function partB(): int;
}
