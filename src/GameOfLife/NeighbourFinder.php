<?php

namespace GameOfLife;

/**
 * Class NeighbourFinder
 * @package GameOfLife
 */
class NeighbourFinder
{
    /**
     * @param int $x
     * @param int $y
     * @param int $dimension
     * @return array
     */
    public function getNeighbours($x, $y, $dimension)
    {
        $neighbours = [];

        $neighbours[] = [$this->modular($x - 1, $dimension), $this->modular($y - 1, $dimension)];
        $neighbours[] = [$this->modular($x - 1, $dimension), $this->modular($y    , $dimension)];
        $neighbours[] = [$this->modular($x - 1, $dimension), $this->modular($y + 1, $dimension)];
        $neighbours[] = [$this->modular($x, $dimension),     $this->modular($y - 1, $dimension)];
        $neighbours[] = [$this->modular($x, $dimension),     $this->modular($y + 1, $dimension)];
        $neighbours[] = [$this->modular($x + 1, $dimension), $this->modular($y - 1, $dimension)];
        $neighbours[] = [$this->modular($x + 1, $dimension), $this->modular($y    , $dimension)];
        $neighbours[] = [$this->modular($x + 1, $dimension), $this->modular($y + 1, $dimension)];

        return $neighbours;
    }
    
    private function modular($value, $dimension)
    {
        if ($value < 0) {
            return $value + $dimension;
        }

        return $value % $dimension;
    }
}
