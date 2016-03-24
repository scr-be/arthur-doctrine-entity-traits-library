<?php

/*
 * This file is part of the arthur-doctrine-entity-traits-library.
 *
 * (c) Scribe Inc. <scr@src.run>
 * (c) Rob Frawley 2nd <rmf@src.run>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Scribe\Doctrine\ORM\Model\Number;

/**
 * Class OrderMutatorsTrait.
 */
trait OrderMutatorsTrait
{
    /**
     * @var int
     */
    private $order;

    /**
     * Init trait.
     */
    public function initializeOrder()
    {
        $this->order = -1;

        return $this;
    }

    /**
     * Set order.
     *
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
     * Get order.
     *
     * @return int
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Checker for order.
     *
     * @return bool
     */
    public function hasOrder()
    {
        return (bool) ($this->order !== -1);
    }

    /**
     * Clear order.
     *
     * @return $this
     */
    public function clearOrder()
    {
        return $this->initializeOrder();
    }

    /**
     * @param int $by
     *
     * @return $this
     */
    public function incrementOrder($by = 1)
    {
        $this->order += $by;

        return $this;
    }

    /**
     * @param int $by
     *
     * @return $this
     */
    public function decrementOrder($by = 1)
    {
        $this->order -= $by;

        return $this;
    }
}

/* EOF */
