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
 * Class HasVersion.
 */
trait VersionMutatorsTrait
{
    /**
     * The version property.
     *
     * @var string
     */
    protected $version;

    /**
     * Init trait.
     */
    public function initializeVersion()
    {
        $this->version = null;
    }

    /**
     * Setter for version property.
     *
     * @param string|null $version the version integer value
     *
     * @return $this
     */
    public function setVersion($version = null)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Getter for version property.
     *
     * @return string|null
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Checker for version property.
     *
     * @return bool
     */
    public function hasVersion()
    {
        return (bool) ($this->getVersion() !== null);
    }

    /**
     * Nullify the version property.
     *
     * @return $this
     */
    public function clearVersion()
    {
        $this->setVersion(null);

        return $this;
    }
}

/* EOF */
