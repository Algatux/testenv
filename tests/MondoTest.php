<?php

namespace Tests;

use GameOfLife\Cella;
use GameOfLife\GridFactory;
use GameOfLife\Mondo;
use GameOfLife\NeighbourAliveCounter;
use GameOfLife\NeighbourFinder;
use GameOfLife\Status;
use Prophecy\Argument;

/**
 * Class MondoTest
 * @package Tests
 */
class MondoTest extends \PHPUnit_Framework_TestCase
{
    public function testInit()
    {
        $grid = [new Cella(true)];
        $factory = $this->prophesize(GridFactory::class);
        $factory->createGrid(5)->shouldBeCalledTimes(1)->willReturn($grid);

        $mondo = new Mondo(
            $factory->reveal(),
            $this->prophesize(NeighbourFinder::class)->reveal(),
            $this->prophesize(NeighbourAliveCounter::class)->reveal(),
            $this->prophesize(Status::class)->reveal(),
            5);

        $this->assertSame($grid, $mondo->getGrid());
    }

    public function testTick()
    {
        $grid = [
            [$this->mockCella(), $this->mockCella(), $this->mockCella(), $this->mockCella(), $this->mockCella()],
            [$this->mockCella(), $this->mockCella(), $this->mockCella(), $this->mockCella(), $this->mockCella()],
            [$this->mockCella(), $this->mockCella(), $this->mockCella(), $this->mockCella(), $this->mockCella()],
            [$this->mockCella(), $this->mockCella(), $this->mockCella(), $this->mockCella(), $this->mockCella()],
            [$this->mockCella(), $this->mockCella(), $this->mockCella(), $this->mockCella(), $this->mockCella()],
        ];
        
        $factory = $this->prophesize(GridFactory::class);
        $factory->createGrid(5)->shouldBeCalledTimes(1)->willReturn($grid);

        $status = $this->prophesize(Status::class);
        $neighbourFinder = $this->prophesize(NeighbourFinder::class);
        $neighbourAliveCounter = $this->prophesize(NeighbourAliveCounter::class);
        $coordinates = [[0, 0]];
        foreach ($grid as $i => $row) {
            foreach ($row as $j => $cell) {
                $neighbourFinder->getNeighbours($i, $j, 5)->shouldBeCalledTimes(1)->willReturn($coordinates);
                $neighbourAliveCounter->countAlive($grid, $coordinates)->shouldBeCalled()->willReturn(7);
                $status->setNextStatus($cell, 7)->shouldBeCalledTimes(1);
            }
        }
        
        $mondo = new Mondo($factory->reveal(), $neighbourFinder->reveal(), $neighbourAliveCounter->reveal(), $status->reveal(), 5);
        
        $mondo->advance();
    }
    
    private function mockCella()
    {
        $cella = $this->prophesize(Cella::class);
        $cella->tick()->shouldBeCalledTimes(1);
        
        return $cella->reveal();
    }
}
