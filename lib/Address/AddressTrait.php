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

use SR\Doctrine\ORM\Model\Text\NameTrait;
use SR\Doctrine\ORM\Model\Type\TypeTrait;

/**
 * Class AddressTrait.
 */
trait AddressTrait
{
    use NameTrait;
    use TypeTrait;

    /**
     * @var string
     */
    protected $addressLine1;

    /**
     * @var string|null
     */
    protected $addressLine2;

    /**
     * @var string|null
     */
    protected $addressLine3;

    /**
     * @var string
     */
    protected $city;

    /**
     * @var string
     */
    protected $state;

    /**
     * @var string
     */
    protected $zip;

    /**
     * @param string $addressLine1
     *
     * @return $this
     */
    public function setAddressLine1($addressLine1)
    {
        $this->addressLine1 = $addressLine1;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddressLine1()
    {
        return $this->addressLine1;
    }

    /**
     * @return bool
     */
    public function hasAddressLine1()
    {
        return $this->addressLine1 !== null;
    }

    /**
     * @return $this
     */
    public function clearAddressLine1()
    {
        $this->addressLine1 = null;

        return $this;
    }

    /**
     * @param string|null $addressLine2
     *
     * @return $this
     */
    public function setAddressLine2($addressLine2 = null)
    {
        $this->addressLine2 = $addressLine2;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddressLine2()
    {
        return $this->addressLine2;
    }

    /**
     * @return bool
     */
    public function hasAddressLine2()
    {
        return $this->addressLine2 !== null;
    }

    /**
     * @return $this
     */
    public function clearAddressLine2()
    {
        $this->addressLine2 = null;

        return $this;
    }

    /**
     * @param string|null $addressLine3
     *
     * @return $this
     */
    public function setAddressLine3($addressLine3 = null)
    {
        $this->addressLine3 = $addressLine3;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddressLine3()
    {
        return $this->addressLine3;
    }

    /**
     * @return bool
     */
    public function hasAddressLine3()
    {
        return $this->addressLine3 !== null;
    }

    /**
     * @return $this
     */
    public function clearAddressLine3()
    {
        $this->addressLine3 = null;

        return $this;
    }

    /**
     * @param string $city
     *
     * @return $this
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return bool
     */
    public function hasCity()
    {
        return $this->city !== null;
    }

    /**
     * @return $this
     */
    public function clearCity()
    {
        $this->city = null;

        return $this;
    }

    /**
     * @param string $state
     *
     * @return $this
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return bool
     */
    public function hasState()
    {
        return $this->state !== null;
    }

    /**
     * @return $this
     */
    public function clearState()
    {
        $this->state = null;

        return $this;
    }

    /**
     * @param string $zip
     *
     * @return $this
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @return bool
     */
    public function hasZip()
    {
        return $this->zip !== null;
    }

    /**
     * @return $this
     */
    public function clearZip()
    {
        $this->zip = null;

        return $this;
    }
}

/* EOF */
