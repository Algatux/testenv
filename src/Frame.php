<?php
declare(strict_types=1);
namespace Test;

/**
 * Class Frame
 * @package Test
 */
class Frame
{

    /** @var int  */
    protected $score;

    /** @var int  */
    protected $availableRolls;

    /**
     * Frame constructor.
     * @param int $availableRolls
     */
    public function __construct(int $availableRolls = 2)
    {
        $this->score = 0;
        $this->availableRolls = $availableRolls;
    }

    /**
     * @return int
     */
    public function getScore(): int
    {
        return $this->score;
    }

    /**
     * @param int $score
     */
    public function setScore(int $score)
    {
        if ($this->availableRolls === 0 || $this->score == 10) {
            throw new \InvalidArgumentException('You can not roll anymore');
        }

        $this->availableRolls--;
        $this->score += $score;
    }

    /**
     * @return int
     */
    public function getAvailableRolls(): int
    {
        return $this->availableRolls;
    }

    /**
     * @return bool
     */
    public function isSpare(): bool
    {
        return $this->availableRolls === 0 && $this->score == 10;
    }

    /**
     * @return bool
     */
    public function isStrike(): bool
    {
        return $this->availableRolls == 1 && $this->score == 10;
    }


}
