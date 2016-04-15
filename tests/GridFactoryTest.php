<?php

namespace Tests;


use GameOfLife\Cella;
use GameOfLife\GridFactory;

/**
 * Class GridFactoryTest
 * @package Tests
 */
class GridFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateGrid()
    {
        $factory = new GridFactory();

        $grid = $factory->createGrid(5);

        $this->assertCount(5, $grid);
        foreach ($grid as $row) {
            $this->assertCount(5, $row);
            $this->assertContainsOnlyInstancesOf(Cella::class, $row);
        }
    }
}
