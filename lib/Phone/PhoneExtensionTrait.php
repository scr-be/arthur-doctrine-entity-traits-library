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

namespace SR\Doctrine\ORM\Model\Phone;

/**
 * Class PhoneExtensionTrait
 */
trait PhoneExtensionTrait
{
    /**
     * @var int|null
     */
    protected $extension;

    /**
     * @param int $extension
     *
     * @return $this
     */
    public function setExtension($extension)
    {
        $this->extension = (int) $extension;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * @return bool
     */
    public function hasExtension()
    {
        return $this->extension !== null;
    }

    /**
     * @return $this
     */
    public function clearExtension()
    {
        $this->extension = null;

        return $this;
    }
}

/* EOF */
