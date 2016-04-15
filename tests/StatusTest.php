<?php

namespace Tests;

use GameOfLife\Cella;
use GameOfLife\Status;

/**
 * Class StatusTest
 * @package Tests
 */
class StatusTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider statusesProvider
     */
    public function testsetNextStatus($initialStatus, $count, $expectedNextStatus)
    {
        $cella = $this->prophesize(Cella::class);
        $cella->isAlive()->willReturn($initialStatus);
        $cella->setAliveNextTurn($expectedNextStatus)->shouldBeCalledTimes(1);

        $status = new Status();
        $status->setNextStatus($cella->reveal(), $count);
    }

    public function statusesProvider()
    {
        return [
            [true, 0, false],
            [true, 1, false],
            [true, 2, true],
            [true, 3, true],
            [true, 4, false],
            [true, 5, false],
            [true, 6, false],
            [true, 7, false],
            [true, 8, false],
            [false, 0, false],
            [false, 1, false],
            [false, 2, false],
            [false, 3, true],
            [false, 4, false],
            [false, 5, false],
            [false, 6, false],
            [false, 7, false],
            [false, 8, false],
        ];
    }
}
