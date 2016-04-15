<?php

namespace GameOfLife;

/**
 * Class NeighbourAliveCounter
 * @package GameOfLife
 */
class NeighbourAliveCounter
{
    /**
     * @param array | Cella[][] $grid
     * @param array $neighboursCoordinates
     * @return int
     */
    public function countAlive(array $grid, array $neighboursCoordinates)
    {
        $count = 0;

        foreach ($neighboursCoordinates as $coordinate) {
            $cell = $grid[$coordinate[0]][$coordinate[1]];
            if ($cell->isAlive()) {
                $count++;
            }
        }

        return $count;
    }
}
