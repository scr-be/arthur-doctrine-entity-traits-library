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

namespace SR\Doctrine\ORM\Model\Name;

/**
 * Class NameMutatorsInterface.
 */
interface NameMutatorsInterface
{
    /**
     * Setter for name property.
     *
     * @param string|null $name the name string
     *
     * @return $this
     */
    public function setName($name = null);

    /**
     * Getter for name property.
     *
     * @return string|null
     */
    public function getName();

    /**
     * Checker for name property.
     *
     * @return bool
     */
    public function hasName();

    /**
     * Nullify the name property.
     *
     * @return $this
     */
    public function clearName();
}

/* EOF */
