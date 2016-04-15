<?php

namespace Tests;

use GameOfLife\Cella;

/**
 * Class CellaTest
 */
class CellaTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructorAlive()
    {
        $cella = new Cella(true);

        $this->assertTrue($cella->isAlive());
    }

    public function testConstructorDead()
    {
        $cella = new Cella(false);

        $this->assertFalse($cella->isAlive());
    }

    public function testTick()
    {
        $cella = new Cella(true);
        $cella->setAliveNextTurn(false);

        $this->assertTrue($cella->isAlive());

        $cella->tick();

        $this->assertFalse($cella->isAlive());
    }

    public function testTickWithoutNextTurn()
    {
        $cella = new Cella(true);
        $this->expectException(\Exception::class);
        $cella->tick();
    }

    public function testTickWithoutNextTurnAtSecondCycle()
    {
        $cella = new Cella(true);
        $cella->setAliveNextTurn(true);
        $cella->tick();
        $this->expectException(\Exception::class);
        $cella->tick();
    }
}
