<?php

declare(strict_types=1);

use App\day01\Day01;
use Tester\Assert;

require_once '../bootstrap.php';

$class = new Day01(new \App\Input('input.txt'));
Assert::equal(24000, $class->partA());
