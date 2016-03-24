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
 * Class ParentCollectionInverseMutatorsTrait.
 */
trait ParentCollectionInverseMutatorsTrait
{
    /**
     * @var ArrayCollection
     */
    protected $parents;

    /**
     * Init trait.
     */
    public function initializeParentCollection()
    {
        $this->parents = new ArrayCollection();
    }

    /**
     * Getter for parentCollection.
     *
     * @return ArrayCollection
     */
    public function getParentCollection()
    {
        return $this->parents;
    }

    /**
     * @return bool
     */
    public function hasParentCollection()
    {
        return (bool) ! $this->parents->isEmpty();
    }

    /**
     * @param Entity $parent
     *
     * @return bool
     */
    public function hasParent(Entity $parent)
    {
        return $this->parents->contains($parent);
    }
}

/* EOF */
