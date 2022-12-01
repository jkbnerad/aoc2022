<?php

declare(strict_types=1);

namespace App\day01;

use App\Task;

class Day01 extends Task
{
    public function partA(): int
    {
        $max = $sum = $last = 0;
        $process = static function ($sum) use (&$max, &$last) {
            if ($sum > $last) {
                $last = $sum;
                $max = $sum;
            }
        };

        foreach ($this->getInput()->getLines() as $line) {
            if (empty($line)) {
                $process($sum);
                $sum = 0;
            }
            $sum += (int)$line;
        }
        // process last elf
        $process($sum);

        return $max;
    }

    public function partB(): int
    {
        $sum = 0;
        $three = [];
        $sizeOfArray = 0;
        $process = static function ($sum) use (&$three, &$sizeOfArray) {
            if ($sizeOfArray < 3) {
                $sizeOfArray++;
                $three[] = $sum;
            } else {
                $min = min($three);
                if ($sum > $min) {
                    foreach ($three as $k => $s) {
                        if ($s === $min && $s < $sum) {
                            $three[$k] = $sum;
                            break;
                        }
                    }
                }
            }
        };

        foreach ($this->getInput()->getLines() as $line) {
            if (empty($line)) {
                $process($sum);
                $sum = 0;
            }
            $sum += (int)$line;
        }
        // process last elf
        $process($sum);

        return (int)array_sum($three);
    }
}
