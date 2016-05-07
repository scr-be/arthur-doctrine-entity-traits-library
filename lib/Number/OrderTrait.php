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
 * Class OrderTrait.
 */
trait OrderTrait
{
    /**
     * @var int|null
     */
    protected $order;

    /**
     * @param int $order
     *
     * @return $this
     */
    public function setOrder($order)
    {
        $this->order = (int) $order;

        return $this;
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @return bool
     */
    public function hasOrder()
    {
        return $this->order !== null;
    }

    /**
     * @return $this
     */
    public function clearOrder()
    {
        $this->order = null;

        return $this;
    }

    /**
     * @param int $by
     *
     * @return $this
     */
    public function incrementOrder($by = 1)
    {
        $this->order += (int) $by;

        return $this;
    }

    /**
     * @param int $by
     *
     * @return $this
     */
    public function decrementOrder($by = 1)
    {
        $this->order -= (int) $by;

        return $this;
    }
}

/* EOF */
