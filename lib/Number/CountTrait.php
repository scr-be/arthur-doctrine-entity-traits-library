<?php

/*
 * This file is part of the `src-run/arthur-doctrine-traits-library` project.
 *
 * (c) Rob Frawley 2nd <rmf@src.run>
 * (c) Scribe Inc      <scr@src.run>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace SR\Doctrine\ORM\Model\Number;

/**
 * Class CountTrait
 */
trait CountTrait
{
    /**
     * @var int|null
     */
    protected $count;

    /**
     * @param int
     *
     * @return $this
     */
    public function setCount($count)
    {
        $this->count = (int) $count;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @return bool
     */
    public function hasCount()
    {
        return $this->count !== null;
    }

    /**
     * @return $this
     */
    public function clearCount()
    {
        $this->count = null;

        return $this;
    }

    /**
     * @param int $by
     *
     * @return $this
     */
    public function incrementCount($by = 1)
    {
        $this->count += (int) $by;

        return $this;
    }

    /**
     * @param int $by
     *
     * @return $this
     */
    public function decrementCount($by = 1)
    {
        $this->count -= (int) $by;

        return $this;
    }
}

/* EOF */
