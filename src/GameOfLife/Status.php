<?php

namespace GameOfLife;

/**
 * Class Status
 * @package GameOfLife
 */
class Status
{
    /**
     * @param Cella $cella
     * @param int $aliveNeighbours
     */
    public function setNextStatus(Cella $cella, $aliveNeighbours)
    {
        if ($cella->isAlive()) {
            $cella->setAliveNextTurn($aliveNeighbours == 2 || $aliveNeighbours == 3);
        } else {
            $cella->setAliveNextTurn($aliveNeighbours == 3);
        }
    }
}
