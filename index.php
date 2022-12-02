<?php

declare(strict_types=1);

use App\Task;
use App\Input;

require_once 'vendor/autoload.php';

$days = [1, 2];
foreach ($days as $day) {
    $timeStart = microtime(true);
    $memoryStart = memory_get_usage(true);
    $day = str_pad((string)$day, 2, '0', STR_PAD_LEFT);
    print sprintf("=== \033[34mDay %s\033[0m ===", $day) . PHP_EOL;
    $className = sprintf('App\day%s\Day%s', $day, $day);
    /** @var Task $class */
    if (class_exists($className)) {
        $class = new $className(new Input(__DIR__ . '/src/day' . $day . '/input.txt'));
        print sprintf("Part A: \033[32m%s\033[0m", $class->partA()) . PHP_EOL;
        print sprintf("Part B: \033[32m%s\033[0m", $class->partB()) . PHP_EOL;
    } else {
        print sprintf('!!! Class %s does not exist !!!', $className) . PHP_EOL;
    }
    print sprintf("\033[37mMemory: %s MB\033[0m", round((memory_get_usage(true) - $memoryStart) / 1024 ** 2, 2)) . PHP_EOL;
    print sprintf("\033[37mTime: %s s\033[0m", round((microtime(true) - $timeStart), 4)) . PHP_EOL;
}
