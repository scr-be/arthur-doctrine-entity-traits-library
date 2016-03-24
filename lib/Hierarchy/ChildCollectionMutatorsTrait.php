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
 * Class ChildCollectionMutatorsTrait.
 */
trait ChildCollectionMutatorsTrait
{
    use ChildCollectionInverseMutatorsTrait;

    /**
     * @param ArrayCollection $children
     *
     * @return $this
     */
    public function setChildCollection(ArrayCollection $children = null)
    {
        $this->children = $children;

        return $this;
    }

    /**
     * @return $this
     */
    public function clearChildCollection()
    {
        $this->initializeChildCollection();

        return $this;
    }

    /**
     * @param Entity $child
     *
     * @return $this
     */
    public function addChild(Entity $child)
    {
        if (!$this->hasChild($child)) {
            $this->children->add($child);
        }

        return $this;
    }

    /**
     * @param Entity $child
     *
     * @return $this
     */
    public function removeChild(Entity $child)
    {
        if ($this->hasChild($child)) {
            $this->children->removeElement($child);
        }

        return $this;
    }
}

/* EOF */
