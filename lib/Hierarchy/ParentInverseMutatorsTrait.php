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

namespace SR\Doctrine\ORM\Model\Hierarchy;

use SR\Doctrine\ORM\Mapping\Entity;

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
