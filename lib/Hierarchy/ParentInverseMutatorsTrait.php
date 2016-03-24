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

namespace Scribe\Doctrine\ORM\Model\Hierarchy;

use Scribe\Doctrine\ORM\Mapping\Entity;

/**
 * Class ParentInverseMutatorsTrait.
 */
trait ParentInverseMutatorsTrait
{
    /**
     * Parent entity.
     *
     * @var Entity
     */
    protected $parent;

    /**
     * init trait.
     */
    public function initializeParent()
    {
        $this->parent = null;
    }

    /**
     * Getter for parent.
     *
     * @return Entity
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Checker for parent.
     *
     * @return bool
     */
    public function hasParent()
    {
        return $this->parent !== null;
    }
}

/* EOF */
