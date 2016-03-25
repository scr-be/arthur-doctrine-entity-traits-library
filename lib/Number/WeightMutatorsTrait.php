<?php

/*
 * This file is part of the `src-run/arthur-doctrine-entity-traits-library` project.
 *
 * (c) Rob Frawley 2nd <rmf@src.run>
 * (c) Scribe Inc      <scr@src.run>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace SR\Doctrine\ORM\Model\Number;

/**
 * Class WeightMutatorsTrait.
 */
trait WeightMutatorsTrait
{
    /**
     * @var int
     */
    private $weight;

    /**
     * Init trait.
     */
    public function initializeWeight()
    {
        $this->weight = null;

        return $this;
    }

    /**
     * Set weight.
     *
     * @param int $weight
     *
     * @return $this
     */
    public function setWeight($weight)
    {
        $this->weight = (int) $weight;

        return $this;
    }

    /**
     * Get weight.
     *
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Checker for weight.
     *
     * @return bool
     */
    public function hasWeight()
    {
        return (bool) ($this->weight !== null);
    }

    /**
     * Clear weight.
     *
     * @return $this
     */
    public function clearWeight()
    {
        return $this->initializeWeight();
    }

    /**
     * @param int $by
     *
     * @return $this
     */
    public function incrementWeight($by = 1)
    {
        $this->weight += $by;

        return $this;
    }

    /**
     * @param int $by
     *
     * @return $this
     */
    public function decrementWeight($by = 1)
    {
        $this->weight -= $by;

        return $this;
    }
}

/* EOF */
