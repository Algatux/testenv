<?php

namespace GameOfLife;

/**
 * Class GridFactory
 * @package GameOfLife
 */
class GridFactory
{
    public function createGrid($dimension)
    {
        $grid = array();

        for ($i = 0; $i < $dimension; $i++) {
            for ($j = 0; $j < $dimension; $j++) {
                $grid[$i][$j] = new Cella((bool) rand(0, 1));
            }
        }

        return $grid;
    }
}
