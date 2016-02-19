<?php
declare(strict_types=1);
namespace Test\Interfaces;

interface GameInterface
{

    public function roll(int $pins): void;

    public function score(): int;

}
