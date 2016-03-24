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

namespace Scribe\Doctrine\ORM\Model\Person;

/**
 * Class FirstNameMutatorsTrait.
 */
trait FirstNameMutatorsTrait
{
    /**
     * The firstName property.
     *
     * @var string
     */
    protected $firstName;

    /**
     * Init trait.
     */
    public function initializeFirstName()
    {
        $this->firstName = null;
    }

    /**
     * Setter for firstName property.
     *
     * @param string|null $firstName the firstName string
     *
     * @return $this
     */
    public function setFirstName($firstName = null)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Getter for firstName property.
     *
     * @return string|null
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Checker for firstName property.
     *
     * @return bool
     */
    public function hasFirstName()
    {
        return (bool) ($this->getFirstName() !== null);
    }

    /**
     * Nullify the firstName property.
     *
     * @return $this
     */
    public function clearFirstName()
    {
        $this->setFirstName(null);

        return $this;
    }
}

/* EOF */
