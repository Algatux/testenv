<?php

namespace GameOfLife;

/**
 * Class Mondo
 * @package GameOfLife
 */
class Mondo
{
    /** @var  NeighbourFinder */
    private $neighbourFinder;

    /** @var  NeighbourAliveCounter */
    private $neighbourAliveCounter;

    /** @var  Status */
    private $status;

    /** @var  array | Cella[][] */
    private $grid;

    /**
     * Mondo constructor.
     * @param GridFactory $gridFactory
     * @param NeighbourFinder $neighbourFinder
     * @param NeighbourAliveCounter $neighbourAliveCounter
     * @param Status $status
     * @param int $dimension
     */
    public function __construct(
        GridFactory $gridFactory,
        NeighbourFinder $neighbourFinder,
        NeighbourAliveCounter $neighbourAliveCounter,
        Status $status,
        $dimension = 10
    ) {
        $this->grid = $gridFactory->createGrid($dimension);
        $this->neighbourFinder = $neighbourFinder;
        $this->neighbourAliveCounter = $neighbourAliveCounter;
        $this->status = $status;
    }

    /**
     * @return array
     */
    public function getGrid()
    {
        return $this->grid;
    }

    public function advance()
    {
        foreach ($this->grid as $i => $row) {
            foreach ($row as $j => $cell) {
                $coordinates = $this->neighbourFinder->getNeighbours($i, $j, count($this->grid));

                $alive = $this->neighbourAliveCounter->countAlive($this->grid, $coordinates);

                $this->status->setNextStatus($cell, $alive);
            }
        }

        foreach ($this->grid as $row) {
            foreach ($row as $cell) {
                $cell->tick();
            }
        }
    }
}
