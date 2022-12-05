<?php

declare(strict_types=1);

namespace App\day04;

use App\Task;

class Day04 extends Task
{

    public function partA(): int
    {

        $count = 0;
        foreach ($this->getInput()->getLines() as $line) {
            [$a, $b] = explode(',', $line);
            [$a1, $a2] = explode('-', $a);
            [$b1, $b2] = explode('-', $b);

            if($b1 >= $a1 && $b2<= $a2) {
                $count++;
            } elseif ($a1 >= $b1 && $a2 <= $b2) {
                $count++;
            }

        }


        return $count;
    }

    public function partB(): int
    {
        $count = 0;
        foreach ($this->getInput()->getLines() as $line) {
            [$a, $b] = explode(',', $line);
            [$a1, $a2] = explode('-', $a);
            [$b1, $b2] = explode('-', $b);

            if ($b1 <= $a2 && $b2 >= $a1) {
                $count++;
            } elseif($a1 <= $b2 && $a2 >= $b1) {
                $count++;
            }

        }


        return $count;
    }
}
