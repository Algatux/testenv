<?php

namespace Tests;

use GameOfLife\Cella;
use GameOfLife\NeighbourAliveCounter;

/**
 * Class NeighbourAliveCounterTest
 * @package Tests
 */
class NeighbourAliveCounterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider aliveProvider
     */
    public function testCountAlive($coordinates, $expectedCount)
    {
        $counter = new NeighbourAliveCounter();
        $grid = [
            [new Cella(true), new Cella(true), new Cella(false)],
            [new Cella(true), new Cella(true), new Cella(false)],
            [new Cella(true), new Cella(true), new Cella(false)],
        ];

        $this->assertEquals($expectedCount, $counter->countAlive($grid, $coordinates));
    }

    public function aliveProvider()
    {
        return [
            [[[0, 1], [1, 1], [2, 1]], 3],
            [[[0, 2], [1, 2], [2, 2]], 0],
            [[[0, 0], [1, 1], [2, 2]], 2],
        ];
    }
}
