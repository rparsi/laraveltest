<?php

namespace NumberChecker;

use App\NumberChecker\Checker;
use PHPUnit\Framework\TestCase;

class CheckerTest extends TestCase
{
    public static function reverseArrayProvider(): array
    {
        $checker = new Checker();
        return [
            [ [1,2,'even',4], $checker, [4,'even',2,1] ],
            [ [1,2,3,'odd',5], $checker, [5,'odd',3,2,1] ]
        ];
    }

    /**
     * @dataProvider reverseArrayProvider
     */
    public function testReverseArray(array $data, Checker $checker, array $expected)
    {
        $this->assertEquals($expected, $checker->reverseArray($data));
    }

    public static function findMostFrequentIntsProvider(): array
    {
        $checker = new Checker();
        return [
            [ [5,7,7,1,9,1,11,1], $checker, [1] ],
            [ [22,3,4,11,22,22,0,9,7,7,9,22], $checker, [22] ],
            [ [300,499,499,301,4,302,4,1,9,7], $checker, [4,499] ]
        ];
    }

    /**
     * @dataProvider findMostFrequentIntsProvider
     */
    public function testFindMostFrequentInts(array $data, Checker $checker, $expected)
    {
        $this->assertEquals($expected, $checker->findMostFrequentInts($data));
    }

    public static function findPairsWithSumProvider(): array
    {
        $checker = new Checker();
        return [
            [ [4,6,3,7,1,11,22,0,44,10], $checker, [[4,6],[3,7],[0,10]] ],
            [ [4,9,7,10,0,1], $checker, [[10,0],[9,1]] ],
            [ [4,9,1,7,10,10,1,0], $checker, [[9,1],[10,0]] ]
        ];
    }

    /**
     * @dataProvider findPairsWithSumProvider
     */
    public function testFindPairsWithSum(array $data, Checker $checker, $expected)
    {
        $this->assertEquals($expected, $checker->findPairsWithSum($data));
    }
}
