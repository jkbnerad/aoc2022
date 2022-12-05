<?php

declare(strict_types=1);

use App\day04\Day04;
use App\Input;
use Tester\Assert;

require_once '../bootstrap.php';

$class = new Day04(new Input('input.txt'));
Assert::equal(4, $class->partB());
