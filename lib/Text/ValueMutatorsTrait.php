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

namespace SR\Doctrine\ORM\Model\Text;

/**
 * Class ValueMutatorsTrait.
 */
trait ValueMutatorsTrait
{
    /**
     * The value property.
     *
     * @var string
     */
    protected $value;

    /**
     * Init trait.
     */
    public function initializeValue()
    {
        $this->value = null;
    }

    /**
     * Setter for value property.
     *
     * @param string|null $value the value string
     *
     * @return $this
     */
    public function setValue($value = null)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Getter for value property.
     *
     * @return string|null
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Checker for value property.
     *
     * @return bool
     */
    public function hasValue()
    {
        return (bool) ($this->getValue() !== null);
    }

    /**
     * Nullify the value property.
     *
     * @return $this
     */
    public function clearValue()
    {
        $this->setValue(null);

        return $this;
    }
}

/* EOF */
