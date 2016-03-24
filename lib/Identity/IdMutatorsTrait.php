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

namespace Scribe\Doctrine\ORM\Model\Identity;

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
