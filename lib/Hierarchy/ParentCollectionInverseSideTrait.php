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

use Doctrine\Common\Collections\ArrayCollection;
use SR\Doctrine\ORM\Mapping\Entity;

/**
 * Class ParentCollectionInverseSideTrait.
 */
trait ParentCollectionInverseSideTrait
{
    /**
     * @var ArrayCollection
     */
    protected $parents;

    /**
     * @return $this
     */
    protected function __initializeParentCollection()
    {
        $this->parents = new ArrayCollection();

        return $this;
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
        return ! $this->parents->isEmpty();
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
