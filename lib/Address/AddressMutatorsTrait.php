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

use SR\Doctrine\ORM\Model\Name\NameMutatorsTrait;
use SR\Doctrine\ORM\Model\Type\TypeMutatorsTrait;

/**
 * Class AddressMutatorsTrait.
 */
trait AddressMutatorsTrait
{
    use NameMutatorsTrait;
    use TypeMutatorsTrait;

    /**
     * @var string
     */
    protected $address01;

    /**
     * @var string|null
     */
    protected $address02;

    /**
     * @var string|null
     */
    protected $address03;

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
     * @return $this
     */
    public function initializeAddress01()
    {
        $this->address01 = null;

        return $this;
    }

    /**
     * @return $this
     */
    public function initializeAddress02()
    {
        $this->address02 = null;

        return $this;
    }

    /**
     * @return $this
     */
    public function initializeAddress03()
    {
        $this->address03 = null;

        return $this;
    }

    /**
     * @return $this
     */
    public function initializeCity()
    {
        $this->city = null;

        return $this;
    }

    /**
     * @return $this
     */
    public function initializeState()
    {
        $this->state = null;

        return $this;
    }

    /**
     * @return $this
     */
    public function initializeZip()
    {
        $this->zip = null;

        return $this;
    }

    /**
     * @param string $address01
     *
     * @return $this
     */
    public function setAddress01($address01)
    {
        $this->address01 = $address01;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddress01()
    {
        return $this->address01;
    }

    /**
     * @return bool
     */
    public function hasAddress01()
    {
        return $this->address01 !== null;
    }

    /**
     * @return $this
     */
    public function clearAddress01()
    {
        $this->initializeAddress01();

        return $this;
    }

    /**
     * @param string|null $address02
     *
     * @return $this
     */
    public function setAddress02($address02 = null)
    {
        $this->address02 = $address02;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddress02()
    {
        return $this->address02;
    }

    /**
     * @return bool
     */
    public function hasAddress02()
    {
        return $this->address02 !== null;
    }

    /**
     * @return $this
     */
    public function clearAddress02()
    {
        $this->initializeAddress02();

        return $this;
    }

    /**
     * @param string|null $address03
     *
     * @return $this
     */
    public function setAddress03($address03 = null)
    {
        $this->address03 = $address03;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddress03()
    {
        return $this->address03;
    }

    /**
     * @return bool
     */
    public function hasAddress03()
    {
        return $this->address03 !== null;
    }

    /**
     * @return $this
     */
    public function clearAddress03()
    {
        $this->initializeAddress03();

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
        $this->initializeCity();

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
        $this->initializeState();

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
        $this->initializeZip();

        return $this;
    }
}

/* EOF */
