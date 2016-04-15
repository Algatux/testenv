<?php

namespace Tests;


use GameOfLife\NeighbourFinder;

class NeighbourFinderTest extends \PHPUnit_Framework_TestCase
{
    public function testGetNeighbours()
    {
        $finder = new NeighbourFinder();

        $neighbours = $finder->getNeighbours(1, 1, 5);

        $this->assertCount(8, $neighbours);
        $this->assertEquals([
            [0, 0],
            [0, 1],
            [0, 2],
            [1, 0],
            [1, 2],
            [2, 0],
            [2, 1],
            [2, 2],
        ], $neighbours);
    }

    public function testGetNeighboursUpperLeftCorner()
    {
        $finder = new NeighbourFinder();

        $neighbours = $finder->getNeighbours(0, 0, 5);

        $this->assertCount(8, $neighbours);
        $this->assertEquals([
            [4, 4],
            [4, 0],
            [4, 1],
            [0, 4],
            [0, 1],
            [1, 4],
            [1, 0],
            [1, 1],
        ], $neighbours);
    }

    public function testGetNeighboursLowerRightCorner()
    {
        $finder = new NeighbourFinder();

        $neighbours = $finder->getNeighbours(4, 4, 5);

        $this->assertCount(8, $neighbours);
        $this->assertEquals([
            [3, 3],
            [3, 4],
            [3, 0],
            [4, 3],
            [4, 0],
            [0, 3],
            [0, 4],
            [0, 0],
        ], $neighbours);
    }
}
