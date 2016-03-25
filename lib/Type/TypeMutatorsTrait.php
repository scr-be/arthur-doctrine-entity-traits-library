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

namespace SR\Doctrine\ORM\Model\Type;

/**
 * Class TypeMutatorsTrait.
 */
trait TypeMutatorsTrait
{
    /**
     * @var mixed|null
     */
    protected $type;

    /**
     * Initialize trait.
     */
    public function initializeType()
    {
        $this->type = null;
    }

    /**
     * @return mixed|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed|null $type
     *
     * @return $this
     */
    public function setType($type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasType()
    {
        return (bool) ($this->type !== null);
    }

    /**
     * @return $this
     */
    public function clearType()
    {
        $this->type = null;

        return $this;
    }
}

/* EOF */
