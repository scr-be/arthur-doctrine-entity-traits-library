<?php

/*
 * This file is part of the arthur-doctrine-entity-traits-library.
 *
 * (c) Scribe Inc. <https://scribe.software>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Scribe\Doctrine\ORM\Model\Address;

use Scribe\Doctrine\ORM\Model\Name\NameMutatorsInterface;
use Scribe\Doctrine\ORM\Model\Type\TypeMutatorsInterface;

/**
 * Class AddressInterface.
 */
interface AddressMutatorsInterface extends TypeMutatorsInterface, NameMutatorsInterface
{
    /**
     * @param string $address01
     *
     * @return $this
     */
    public function setAddress01($address01);

    /**
     * @return string
     */
    public function getAddress01();

    /**
     * @param string|null $address02
     *
     * @return $this
     */
    public function setAddress02($address02 = null);

    /**
     * @return string|null
     */
    public function getAddress02();

    /**
     * @return bool
     */
    public function hasAddress02();

    /**
     * @param string|null $address03
     *
     * @return $this
     */
    public function setAddress03($address03 = null);

    /**
     * @return string|null
     */
    public function getAddress03();

    /**
     * @return bool
     */
    public function hasAddress03();

    /**
     * @param string $city
     *
     * @return $this
     */
    public function setCity($city);

    /**
     * @return string
     */
    public function getCity();

    /**
     * @param string $state
     *
     * @return $this
     */
    public function setState($state);

    /**
     * @return string
     */
    public function getState();

    /**
     * @param string $zip
     *
     * @return $this
     */
    public function setZip($zip);

    /**
     * @return string
     */
    public function getZip();
}

/* EOF */
