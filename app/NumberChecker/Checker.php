<?php

namespace App\NumberChecker;

class Checker
{
    public function reverseArray(array $data): array
    {
        $reversedData = [];
        $startPosition = 0;
        $stopPosition = count($data) - 1;
        $position = $stopPosition;

        while ($position >= $startPosition) {
            $reversedData[] = $data[$position];
            $position--;
        }
        return $reversedData;
    }

    public function findMostFrequentInts(array $data): array
    {
        $hits = array_count_values($data);
        asort($hits, \SORT_NUMERIC);

        $maxHits = end($hits);
        $mostFrequentInts = [key($hits)];

        while (prev($hits) !== FALSE && current($hits) == $maxHits) {
            $mostFrequentInts[] = key($hits);
        }
        return $mostFrequentInts;
    }

    public function findPairsWithSum(array $data, $sum = 10): array
    {
        $expectedPairs = [];
        $foundPairs = [];
        foreach ($data as $number) {
            $otherNumber = $sum - $number;
            if (isset($expectedPairs[$otherNumber])) {
                $foundPairs[$otherNumber] = [$otherNumber, $number];
                continue;
            }
            $expectedPairs[$number] = [$number, $otherNumber];
        }
        return array_values($foundPairs);
    }
}
