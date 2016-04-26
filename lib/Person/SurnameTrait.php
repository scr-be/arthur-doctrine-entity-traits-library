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
 * Class SurnameTrait.
 */
trait SurnameTrait
{
    /**
     * @var string
     */
    protected $surname;

    /**
     * @param string $surname
     *
     * @return $this
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @return bool
     */
    public function hasSurname()
    {
        return $this->surname !== null;
    }

    /**
     * @return $this
     */
    public function clearSurname()
    {
        $this->surname = null;

        return $this;
    }
}

/* EOF */
