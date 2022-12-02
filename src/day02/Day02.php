<?php

declare(strict_types=1);

namespace App\day02;

use App\Task;

class Day02 extends Task
{

    public function partA(): int
    {
        $points = [
            'X' => 1, // rock
            'Y' => 2, // paper
            'Z' => 3 // scissor
        ];

        // rock     paper   scissors
        // A        B       C
        // X        Y       Z

        $results = 0;
        foreach ($this->getInput()->getLines() as $line) {
            [$playerA, $playerB] = explode(' ', $line);

            if ($playerA === 'A') { // kamen
                if($playerB === 'Y') { // papir
                    $win = 1;
                } elseif ($playerB === 'X') { // kamen
                    $win = 0;
                } else { // nuzky
                    $win = -1;
                }
            } elseif ($playerA === 'B') { // papir
                if($playerB === 'Y') { // papir
                    $win = 0;
                } elseif ($playerB === 'X') { // kamen
                    $win = -1;
                } else { // nuzky
                    $win = 1;
                }
            } else { // nuzky
                if($playerB === 'Y') { // papir
                    $win = -1;
                } elseif ($playerB === 'X') { // kamen
                    $win = 1;
                } else { // nuzky
                    $win = 0;
                }
            }

            $results += $points[$playerB];
            if ($win === 1) {
                $results += 6;
            } elseif ($win === 0) {
                $results += 3;
            }

        }

        return $results;
    }

    public function partB(): int
    {
        // kamen, papir, nuzky
        // A,     B,     C

        // X -> -1, Y -> 0, Z -> 1

        $results = 0;
        foreach ($this->getInput()->getLines() as $line) {
            [$playerA, $playerB] = explode(' ', $line);
            if ($playerA === 'A') { // kamen

                if ($playerB === 'X') {
                    $win = -1;
                    $results += 3; // nuzky
                } elseif ($playerB === 'Y') {
                    $win = 0;
                    $results += 1; // kamen
                } else {
                    $win = 1;
                    $results += 2; // papir
                }

            } elseif ($playerA === 'B') { // papir
                if ($playerB === 'X') {
                    $win = -1;
                    $results += 1; // kamen
                } elseif ($playerB === 'Y') {
                    $win = 0;
                    $results += 2; // papir
                } else {
                    $win = 1;
                    $results += 3; // nuzky
                }
            } else { // nuzky
                if ($playerB === 'X') {
                    $win = -1;
                    $results += 2; // papir
                } elseif ($playerB === 'Y') {
                    $win = 0;
                    $results += 3; // nuzky
                } else {
                    $win = 1;
                    $results += 1; // kamen
                }
            }

            if ($win === 1) {
                $results += 6;
            } elseif ($win === 0) {
                $results += 3;
            }

        }

        return $results;
    }
}
