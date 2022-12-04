<?php

declare(strict_types=1);

use App\day03\Day03;
use App\Input;
use Tester\Assert;

require_once '../bootstrap.php';

$class = new Day03(new Input('input.txt'));
Assert::equal(157, $class->partA());
