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
 * Class WeightTrait.
 */
trait WeightTrait
{
    /**
     * @var int
     */
    private $weight;

    /**
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
     * @return bool
     */
    public function hasWeight()
    {
        return $this->weight !== null;
    }

    /**
     * @return $this
     */
    public function clearWeight()
    {
        $this->weight = null;

        return $this;
    }

    /**
     * @param int $by
     *
     * @return $this
     */
    public function incrementWeight($by = 1)
    {
        $this->weight += (int) $by;

        return $this;
    }

    /**
     * @param int $by
     *
     * @return $this
     */
    public function decrementWeight($by = 1)
    {
        $this->weight -= (int) $by;

        return $this;
    }
}

/* EOF */
