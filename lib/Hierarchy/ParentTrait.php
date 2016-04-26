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
 * Class ParentTrait.
 */
trait ParentTrait
{
    use ParentInverseSideTrait;

    /**
     * @param Entity|null
     *
     * @return $this
     */
    public function setParent(Entity $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return $this
     */
    public function clearParent()
    {
        $this->parent = null;

        return $this;
    }
}

/* EOF */
