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

            if (ord($playerA) - ord('A') === ord($playerB) - ord('X')) { // draw
                $results += 3;
            } elseif ($playerA === 'A' && $playerB === 'Y') { // rock vs. paper
                $results += 6;
            } elseif ($playerA === 'B' && $playerB === 'Z') { // paper vs. scissors
                $results += 6;
            } elseif ($playerA === 'C' && $playerB === 'X') { // scissors vs. rock
                $results += 6;
            }

            $results += $points[$playerB];
        }

        return $results;
    }

    public function partB(): int
    {
        // rock     paper   scissors
        // A        B       C
        // X        Y       Z

        // X -> -1, Y -> 0, Z -> 1

        $results = 0;
        foreach ($this->getInput()->getLines() as $line) {
            [$playerA, $playerB] = explode(' ', $line);
            if ($playerA === 'A') { // kamen
                if ($playerB === 'X') {
                    $results += 3; // nuzky
                } elseif ($playerB === 'Y') {
                    $results += 1 + 3; // kamen
                } else {
                    $results += 2 + 6; // papir
                }
            } elseif ($playerA === 'B') { // papir
                if ($playerB === 'X') {
                    $results += 1; // kamen
                } elseif ($playerB === 'Y') {
                    $results += 2 + 3; // papir
                } else {
                    $results += 3 + 6; // nuzky
                }
            } else { // nuzky
                if ($playerB === 'X') {
                    $results += 2; // papir
                } elseif ($playerB === 'Y') {
                    $results += 3 + 3; // nuzky
                } else {
                    $win = 1;
                    $results += 1 + 6; // kamen
                }
            }
        }

        return $results;
    }
}
