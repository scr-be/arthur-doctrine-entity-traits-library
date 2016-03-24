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

use Doctrine\Common\Collections\ArrayCollection;
use Scribe\Doctrine\ORM\Mapping\Entity;

/**
 * Class ChildCollectionInverseSideMutatorsTrait.
 */
trait ChildCollectionInverseMutatorsTrait
{
    /**
     * ChildCollection collections.
     *
     * @var ArrayCollection
     */
    protected $children;

    /**
     * Init trait.
     */
    public function initializeChildCollection()
    {
        $this->children = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getChildCollection()
    {
        return $this->children;
    }

    /**
     * @return bool
     */
    public function hasChildCollection()
    {
        return (bool) ! $this->children->isEmpty();
    }

    /**
     * @param Entity $child
     *
     * @return bool
     */
    public function hasChild(Entity $child)
    {
        return $this->children->contains($child);
    }
}

/* EOF */
