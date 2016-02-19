<?php
declare(strict_types=1);
namespace Test;

use Test\Interfaces\GameInterface;

/**
 * Class Game
 * @package Test
 */
class Game implements GameInterface
{

    protected $frames;

    public function __construct()
    {
        $this->frames;
    }

    public function roll(int $pins): void
    {
    }

    public function score(): int
    {
    }

}
