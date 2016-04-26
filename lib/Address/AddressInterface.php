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

namespace SR\Doctrine\ORM\Model\Address;

use SR\Doctrine\ORM\Model\Text\NameInterface;
use SR\Doctrine\ORM\Model\Type\TypeInterface;

/**
 * Class AddressInterface.
 */
interface AddressInterface extends TypeInterface, NameInterface
{
    /**
     * @param string $addressLine1
     *
     * @return $this
     */
    public function setAddressLine1($addressLine1);

    /**
     * @return string
     */
    public function getAddressLine1();

    /**
     * @param string|null $addressLine2
     *
     * @return $this
     */
    public function setAddressLine2($addressLine2 = null);

    /**
     * @return string|null
     */
    public function getAddressLine2();

    /**
     * @return bool
     */
    public function hasAddressLine2();

    /**
     * @param string|null $addressLine3
     *
     * @return $this
     */
    public function setAddressLine3($addressLine3 = null);

    /**
     * @return string|null
     */
    public function getAddressLine3();

    /**
     * @return bool
     */
    public function hasAddressLine3();

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
