<?php

use App\Input;

require_once 'vendor/autoload.php';

foreach ([1] as $day) {
    $timeStart = microtime(true);
    $memoryStart = memory_get_usage(true);
    $day = str_pad($day, 2, '0', STR_PAD_LEFT);
    print sprintf('=== Day %s ===', $day) . PHP_EOL;
    $className = sprintf('App\day01\Day%s', $day);
    $class = new $className(new Input(__DIR__ . '/src/day' . $day . '/input.txt'));
    print sprintf('Part 1: %s', $class->partA()) . PHP_EOL;
    print sprintf('Part 1: %s', $class->partB()) . PHP_EOL;
    print sprintf('Memory: %s MB', round((memory_get_usage(true) - $memoryStart) / 1024 ** 2, 2)) . PHP_EOL;
    print sprintf('Time: %s s', round((microtime(true) - $timeStart), 4)) . PHP_EOL;
}
