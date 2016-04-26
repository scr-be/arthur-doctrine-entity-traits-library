<?php

/*
 * This file is part of the `src-run/arthur-doctrine-traits-library` project.
 *
 * (c) Rob Frawley 2nd <rmf@src.run>
 * (c) Scribe Inc      <scr@src.run>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace SR\Doctrine\ORM\Model\Version;

/**
 * Class VersionStringTrait
 */
trait VersionStringTrait
{
    /**
     * @var string
     */
    protected $version;

    /**
     * @param string $version
     *
     * @return $this
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @return bool
     */
    public function hasVersion()
    {
        return $this->version !== null;
    }

    /**
     * @return $this
     */
    public function clearVersion()
    {
        $this->version = null;

        return $this;
    }
}

/* EOF */
