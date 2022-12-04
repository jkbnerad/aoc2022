<?php

declare(strict_types=1);

namespace App\day03;

use App\Task;

class Day03 extends Task
{

    public function partA(): int
    {
        $chars = [];
        foreach ($this->getInput()->getLines() as $line) {
            $length = strlen($line);
            $a = substr($line, 0, (int) ($length / 2));
            $b = substr($line, (int) ($length / 2));

            for ($i = 0; $i < $length / 2; $i++) {
                $char = $a[$i];
                for ($j = 0; $j < $length / 2; $j++) {
                    if ($char === $b[$j]) {
                        $chars[] = $char;
                        break 2;
                    }
                }
            }
        }


        $points = 0;
        foreach ($chars as $char) {
            if (ord($char) > 90) {
                $points += ord($char) - 96;
            } else {
                $points += ord($char) - 38;
            }
        }

        return $points;
    }

    public function partB(): int
    {
        $chars = [];
        $lines = [];
        $i = 0;
        foreach ($this->getInput()->getLines() as $line) {
            $lines[] = $line;
            $i++;
            if ($i === 3) {
                $l1 = strlen($lines[0]);
                $l2 = strlen($lines[1]);
                $l3 = strlen($lines[2]);
                for ($j = 0; $j < $l1; $j++) {
                    $ch1 = $lines[0][$j];
                    for ($q = 0; $q < $l2; $q++) {
                        $ch2 = $lines[1][$q];
                        if ($ch1 === $ch2) {
                            for ($k = 0; $k < $l3; $k++) {
                                $ch3 = $lines[2][$k];
                                if ($ch3 === $ch2) {
                                    $chars[] = $ch3;
                                    goto end;
                                }
                            }
                        }
                    }
                }

                end:
                $lines = [];
                $i = 0;
            }
        }

        $points = 0;
        foreach ($chars as $char) {
            if (ord($char) > 90) {
                $points += ord($char) - 96;
            } else {
                $points += ord($char) - 38;
            }
        }

        return $points;
    }
}
