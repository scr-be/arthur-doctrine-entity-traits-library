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

namespace SR\Doctrine\ORM\Model\Person;

/**
 * Class MiddleNameMutatorsTrait.
 */
trait MiddleNameMutatorsTrait
{
    /**
     * The middleName property.
     *
     * @var string
     */
    protected $middleName;

    /**
     * Init trait.
     */
    public function initializeMiddleName()
    {
        $this->middleName = null;
    }

    /**
     * Setter for middleName property.
     *
     * @param string|null $middleName the middleName string
     *
     * @return $this
     */
    public function setMiddleName($middleName = null)
    {
        $this->middleName = $middleName;

        return $this;
    }

    /**
     * Getter for middleName property.
     *
     * @return string|null
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * Checker for middleName property.
     *
     * @return bool
     */
    public function hasMiddleName()
    {
        return (bool) ($this->getMiddleName() !== null);
    }

    /**
     * Nullify the middleName property.
     *
     * @return $this
     */
    public function clearMiddleName()
    {
        $this->setMiddleName(null);

        return $this;
    }
}

/* EOF */
