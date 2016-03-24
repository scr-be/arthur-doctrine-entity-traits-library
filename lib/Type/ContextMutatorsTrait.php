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

namespace Scribe\Doctrine\ORM\Model\Type;

/**
 * Class ContextMutatorsTrait.
 */
trait ContextMutatorsTrait
{
    /**
     * The context property.
     *
     * @var string
     */
    protected $context;

    /**
     * Init trait.
     */
    public function initializeContext()
    {
        $this->context = null;
    }

    /**
     * Setter for context property.
     *
     * @param string|null $context the context string
     *
     * @return $this
     */
    public function setContext($context = null)
    {
        $this->context = $context;

        return $this;
    }

    /**
     * Getter for context property.
     *
     * @return string|null
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * Checker for context property.
     *
     * @return bool
     */
    public function hasContext()
    {
        return (bool) ($this->getContext() !== null);
    }

    /**
     * Nullify the context property.
     *
     * @return $this
     */
    public function clearContext()
    {
        $this->context = null;

        return $this;
    }
}

/* EOF */
