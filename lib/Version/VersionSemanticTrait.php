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

namespace SR\Doctrine\ORM\Model\Version;

/**
 * Class VersionSemanticTrait
 */
trait VersionSemanticTrait
{
    /**
     * @var int
     */
    protected $versionMajor;

    /**
     * @var int
     */
    protected $versionMinor;

    /**
     * @var int
     */
    protected $versionPatch;

    /**
     * @param int $major
     * @param int $minor
     * @param int $patch
     *
     * @return $this
     */
    public function setVersion($major, $minor, $patch)
    {
        $this->versionMajor = $major;
        $this->versionMinor = $minor;
        $this->versionPatch = $patch;

        return $this;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        $major = $this->versionMajor ?: 'x';
        $minor = $this->versionMinor ?: 'x';
        $patch = $this->versionPatch ?: 'x';

        return sprintf('%s.%s.%s', $major, $minor, $patch);
    }

    /**
     * @param int $versionMajor
     *
     * @return $this
     */
    public function setVersionMajor($versionMajor)
    {
        $this->versionMajor = (int) $versionMajor;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getVersionMajor()
    {
        return $this->versionMajor;
    }

    /**
     * @return bool
     */
    public function hasVersionMajor()
    {
        return $this->versionMajor !== null;
    }

    /**
     * @return $this
     */
    public function clearVersionMajor()
    {
        $this->versionMajor = null;

        return $this;
    }    
    
    /**
     * @param int $versionMinor
     *
     * @return $this
     */
    public function setVersionMinor($versionMinor)
    {
        $this->versionMinor = (int) $versionMinor;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getVersionMinor()
    {
        return $this->versionMinor;
    }

    /**
     * @return bool
     */
    public function hasVersionMinor()
    {
        return $this->versionMinor !== null;
    }

    /**
     * @return $this
     */
    public function clearVersionMinor()
    {
        $this->versionMinor = null;

        return $this;
    }

    /**
     * @param int $versionPatch
     *
     * @return $this
     */
    public function setVersionPatch($versionPatch)
    {
        $this->versionPatch = (int) $versionPatch;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getVersionPatch()
    {
        return $this->versionPatch;
    }

    /**
     * @return bool
     */
    public function hasVersionPatch()
    {
        return $this->versionPatch !== null;
    }

    /**
     * @return $this
     */
    public function clearVersionPatch()
    {
        $this->versionPatch = null;

        return $this;
    }
}

/* EOF */
