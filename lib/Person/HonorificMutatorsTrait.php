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
 * Class HonorificMutatorsTrait.
 */
trait HonorificMutatorsTrait
{
    /**
     * The honorific property.
     *
     * @var string
     */
    protected $honorific;

    /**
     * Init trait.
     */
    public function initializeHonorific()
    {
        $this->honorific = null;
    }

    /**
     * Setter for honorific property.
     *
     * @param string|null $honorific the honorific string
     *
     * @return $this
     */
    public function setHonorific($honorific = null)
    {
        $this->honorific = $honorific;

        return $this;
    }

    /**
     * Getter for honorific property.
     *
     * @return string|null
     */
    public function getHonorific()
    {
        return $this->honorific;
    }

    /**
     * Checker for honorific property.
     *
     * @return bool
     */
    public function hasHonorific()
    {
        return (bool) ($this->getHonorific() !== null);
    }

    /**
     * Nullify the honorific property.
     *
     * @return $this
     */
    public function clearHonorific()
    {
        $this->initializeHonorific();

        return $this;
    }
}

/* EOF */
