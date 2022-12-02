<?php

declare(strict_types=1);

use App\day02\Day02;
use Tester\Assert;

require_once '../bootstrap.php';

$class = new Day02(new \App\Input('input.txt'));
Assert::equal(12, $class->partB());
