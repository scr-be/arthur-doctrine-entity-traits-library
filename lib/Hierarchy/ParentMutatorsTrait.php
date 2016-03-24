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
 * Class ParentMutatorsTrait.
 */
trait ParentMutatorsTrait
{
    use ParentInverseMutatorsTrait;

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
        $this->initializeParent();

        return $this;
    }
}

/* EOF */
