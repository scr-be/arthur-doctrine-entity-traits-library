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

use Doctrine\Common\Collections\ArrayCollection;
use SR\Doctrine\ORM\Mapping\Entity;

/**
 * Class AddressCollectionMutatorsTrait.
 */
trait AddressCollectionMutatorsTrait
{
    /**
     * @var ArrayCollection
     */
    protected $addresses;

    /**
     * Initialize trait.
     */
    public function initializeAddressCollection()
    {
        $this->addresses = new ArrayCollection();
    }

    /**
     * @param ArrayCollection $addresses
     *
     * @return $this
     */
    public function setAddressCollection(ArrayCollection $addresses = null)
    {
        $this->addresses = $addresses;

        return $this;
    }

    /**
     * @return ArrayCollection|null
     */
    public function getAddressCollection()
    {
        return $this->addresses;
    }

    /**
     * @return bool
     */
    public function hasAddressCollection()
    {
        return (bool) (false === $this->addresses->isEmpty());
    }

    /**
     * @return $this
     */
    public function clearAddressCollection()
    {
        $this->addresses = new ArrayCollection();

        return $this;
    }
    
    /**
     * @param Entity $address
     *
     * @return bool
     */
    public function hasAddress(Entity $address)
    {
        return (bool) (true === $this->addresses->contains($address));
    }

    /**
     * @param Entity $address
     *
     * @return $this
     */
    public function addAddress(Entity $address)
    {
        if (false === $this->hasAddress($address)) {
            $this->addresses->add($address);
        }

        return $this;
    }

    /**
     * @param Entity $address
     *
     * @return $this
     */
    public function removeAddress(Entity $address)
    {
        if (true === $this->hasAddress($address)) {
            $this->addresses->removeElement($address);
        }

        return $this;
    }
}

/* EOF */
