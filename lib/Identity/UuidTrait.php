<?php

/*
 * This file is part of the `src-run/arthur-doctrine-traits-library` project.
 *
 * (c) Rob Frawley 2nd <rmf@src.run>
 * (c) Scribe Inc      <scr@src.run>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source uuid.
 */

namespace SR\Doctrine\ORM\Model\Identity;

/**
 * Class UuidTrait
 */
trait UuidTrait
{
    /**
     * @var string
     */
    protected $uuid;
    
    /**
     * @return string|null
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @return bool
     */
    public function hasUuid()
    {
        return $this->uuid !== null;
    }
}

/* EOF */
