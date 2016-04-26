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

namespace SR\Doctrine\ORM\Model\Person;

/**
 * Class HonorificTrait.
 */
trait HonorificTrait
{
    /**
     * @var string
     */
    protected $honorific;

    /**
     * @param string $honorific
     *
     * @return $this
     */
    public function setHonorific($honorific)
    {
        $this->honorific = $honorific;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getHonorific()
    {
        return $this->honorific;
    }

    /**
     * @return bool
     */
    public function hasHonorific()
    {
        return $this->honorific !== null;
    }

    /**
     * @return $this
     */
    public function clearHonorific()
    {
        $this->honorific = null;

        return $this;
    }
}

/* EOF */
