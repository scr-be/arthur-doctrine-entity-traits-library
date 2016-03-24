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
 * Class ParentCollectionOwningMutatorsTrait.
 */
trait ParentCollectionMutatorsTrait
{
    use ParentCollectionInverseMutatorsTrait;

    /**
     * @param ArrayCollection $parents
     *
     * @return $this
     */
    public function setParentCollection(ArrayCollection $parents = null)
    {
        $this->parents = $parents;

        return $this;
    }

    /**
     * @return $this
     */
    public function clearParentCollection()
    {
        $this->initializeParentCollection();

        return $this;
    }

    /**
     * @param Entity $parent
     *
     * @return $this
     */
    public function addParent(Entity $parent)
    {
        if (! $this->hasParent($parent)) {
            $this->parents->add($parent);
        }
    }

    /**
     * @param Entity $parent
     *
     * @return $this
     */
    public function removeParent(Entity $parent)
    {
        if ($this->hasParent($parent)) {
            $this->parents->removeElement($parent);
        }

        return $this;
    }
}

/* EOF */
