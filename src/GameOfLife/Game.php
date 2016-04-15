<?php

namespace GameOfLife;

/**
 * Class Game
 * @package GameOfLife
 */
class Game
{

    /**
     * Game constructor.
     */
    public function __construct()
    {
        $mondo = new Mondo(
            new GridFactory(),
            new NeighbourFinder(),
            new NeighbourAliveCounter(),
            new Status(),
            40
        );

        do {
            $this->echoStatus($mondo->getGrid());

            $mondo->advance();

            sleep(1);
        } while(true);
    }

    /**
     * @param array | Cella[][] $getGrid
     */
    private function echoStatus(array $getGrid)
    {
        foreach ($getGrid as $row) {
            foreach ($row as $cella) {
                if ($cella->isAlive()) {
                    echo '0';
                } else {
                    echo ' ';
                }
            }
            echo PHP_EOL;
        }

        echo PHP_EOL;
        echo PHP_EOL;
    }
}
