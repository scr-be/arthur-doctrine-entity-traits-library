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

namespace SR\Doctrine\ORM\Model\Identity;

/**
 * Class SlugTrait
 */
trait SlugTrait
{
    /**
     * @var string
     */
    protected $slug;

    /**
     * @return string|null
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @return bool
     */
    public function hasSlug()
    {
        return $this->slug !== null;
    }
}

/* EOF */
