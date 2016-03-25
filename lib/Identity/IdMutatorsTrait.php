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

namespace SR\Doctrine\ORM\Model\Identity;

/**
 * Class IdMutatorsTrait.
 */
trait IdMutatorsTrait
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @return $this
     */
    public function initializeId()
    {
        $this->id = null;

        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function hasId()
    {
        return $this->id !== null;
    }
}

/* EOF */
