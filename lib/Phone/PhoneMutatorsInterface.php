<?php

/*
 * This file is part of the arthur-doctrine-entity-traits-library.
 *
 * (c) Scribe Inc. <https://scribe.software>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Scribe\Doctrine\ORM\Model\Phone;

use Scribe\Doctrine\ORM\Model\Type\TypeMutatorsInterface;
use Scribe\Doctrine\ORM\Model\Name\NameMutatorsInterface;

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
