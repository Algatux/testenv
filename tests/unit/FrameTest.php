<?php
declare(strict_types=1);

use Test\Frame;
use TestCases\BaseTestCase;

class FrameTest extends BaseTestCase
{

    public function test_frame_gets_roll_pins()
    {
        $frame = new Frame();
        $frame->setScore(5);
        $this->assertEquals(5,$frame->getScore());
    }

    public function test_sequential_rolls_are_added_by_frame()
    {
        $frame = new Frame();
        $frame->setScore(4);
        $frame->setScore(5);
        $this->assertEquals(9, $frame->getScore());
        $this->setExpectedException(\InvalidArgumentException::class);
        $frame->setScore(1);
    }

    public function test_frame_return_remaining_available_rolls()
    {
        $frame = new Frame();
        $this->assertEquals(2,$frame->getAvailableRolls());
        $frame->setScore(5);
        $this->assertEquals(1,$frame->getAvailableRolls());
    }

    public function test_frame_kwows_if_a_roll_is_spare()
    {
        $frame = new Frame();
        $frame->setScore(4);
        $frame->setScore(6);
        $this->assertTrue($frame->isSpare());
    }

    public function test_frame_kwows_if_a_roll_is_strike()
    {
        $frame = new Frame();
        $frame->setScore(10);
        $this->assertTrue($frame->isStrike());
    }

    public function test_after_strike_frame_does_not_accept_rolls()
    {
        $frame = new Frame();
        $frame->setScore(10);
        $this->setExpectedException(\InvalidArgumentException::class);
        $frame->setScore(5);
    }

}
