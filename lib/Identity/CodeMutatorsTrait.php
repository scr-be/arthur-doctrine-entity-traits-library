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
 * Class CodeMutatorsTrait.
 */
trait CodeMutatorsTrait
{
    /**
     * The code property.
     *
     * @var string
     */
    protected $code;

    /**
     * Init trait.
     */
    public function initializeCode()
    {
        $this->code = null;
    }

    /**
     * Setter for code property.
     *
     * @param string|null $code the code string
     *
     * @return $this
     */
    public function setCode($code = null)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Getter for code property.
     *
     * @return string|null
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Checker for code property.
     *
     * @return bool
     */
    public function hasCode()
    {
        return (bool) ($this->getCode() !== null);
    }

    /**
     * Nullify the code property.
     *
     * @return $this
     */
    public function clearCode()
    {
        $this->code = null;

        return $this;
    }
}

/* EOF */
