<?php

namespace GameOfLife;

/**
 * Class Cella
 * @package GameOfLife
 */
class Cella
{
    /** @var  bool */
    private $alive;
    
    /** @var  bool */
    private $aliveNextTurn;

    /**
     * Cella constructor.
     * @param bool $alive
     */
    public function __construct($alive)
    {
        $this->alive = $alive;
    }

    /**
     * @return boolean
     */
    public function isAlive()
    {
        return $this->alive;
    }

    /**
     * @param boolean $aliveNextTurn
     */
    public function setAliveNextTurn($aliveNextTurn)
    {
        $this->aliveNextTurn = $aliveNextTurn;
    }

    public function tick()
    {
        if (is_null($this->aliveNextTurn)) {
            throw new \Exception('Next turn value missing');
        }

        $this->alive = $this->aliveNextTurn;
        $this->aliveNextTurn = null;
    }
}
