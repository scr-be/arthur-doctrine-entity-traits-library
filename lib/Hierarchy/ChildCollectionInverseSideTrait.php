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

namespace SR\Doctrine\ORM\Model\Hierarchy;

use Doctrine\Common\Collections\ArrayCollection;
use SR\Doctrine\ORM\Mapping\Entity;

/**
 * Class ChildCollectionInverseSideTrait.
 */
trait ChildCollectionInverseSideTrait
{
    /**
     * @var ArrayCollection
     */
    protected $children;

    /**
     * Init trait.
     */
    protected function initializeChildCollection()
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
        return !$this->children->isEmpty();
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
