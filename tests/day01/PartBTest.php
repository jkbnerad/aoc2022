<?php

declare(strict_types=1);

use App\day01\Day01;
use App\Input;
use Tester\Assert;

require_once '../bootstrap.php';

$class = new Day01(new Input('input.txt'));
Assert::equal(45000, $class->partB());
