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

use SR\Doctrine\ORM\Mapping\Entity;

/**
 * Class ParentInverseSideTrait.
 */
trait ParentInverseSideTrait
{
    /**
     * @var Entity|null
     */
    protected $parent;

    /**
     * @return Entity|null
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @return bool
     */
    public function hasParent()
    {
        return $this->parent !== null;
    }
}

/* EOF */
