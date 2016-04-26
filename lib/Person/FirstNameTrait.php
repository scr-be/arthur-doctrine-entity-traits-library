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
 * Class FirstNameTrait.
 */
trait FirstNameTrait
{
    /**
     * @var string
     */
    protected $firstName;

    /**
     * @param string $firstName
     *
     * @return $this
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return bool
     */
    public function hasFirstName()
    {
        return $this->firstName !== null;
    }

    /**
     * @return $this
     */
    public function clearFirstName()
    {
        $this->firstName = null;

        return $this;
    }
}

/* EOF */
