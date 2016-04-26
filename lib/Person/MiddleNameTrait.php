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

namespace SR\Doctrine\ORM\Model\Person;

/**
 * Class MiddleNameTrait.
 */
trait MiddleNameTrait
{
    /**
     * @var string
     */
    protected $middleName;

    /**
     * @param string $middleName
     *
     * @return $this
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * @return bool
     */
    public function hasMiddleName()
    {
        return $this->middleName !== null;
    }

    /**
     * @return $this
     */
    public function clearMiddleName()
    {
        $this->middleName = null;

        return $this;
    }
}

/* EOF */
