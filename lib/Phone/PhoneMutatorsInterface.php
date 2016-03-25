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

use SR\Doctrine\ORM\Model\Type\TypeMutatorsInterface;
use SR\Doctrine\ORM\Model\Name\NameMutatorsInterface;

/**
 * Class PhoneInterface.
 */
interface PhoneMutatorsInterface extends TypeMutatorsInterface, NameMutatorsInterface
{
    /**
     * @param string $number
     *
     * @return $this
     */
    public function setNumber($number);

    /**
     * @return string
     */
    public function getNumber();

    /**
     * @return string
     */
    public function getNumberFormatted();

    /**
     * @param int $extension
     *
     * @return $this
     */
    public function setExtension($extension);

    /**
     * @return int|null
     */
    public function getExtension();

    /**
     * @return bool
     */
    public function hasExtension();

    /**
     * @return $this
     */
    public function clearExtension();
}

/* EOF */
