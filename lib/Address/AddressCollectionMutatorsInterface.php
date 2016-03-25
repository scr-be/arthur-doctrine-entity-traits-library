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
 * Class AddressCollectionMutatorsInterface.
 */
interface AddressCollectionMutatorsInterface
{
    /**
     * @param ArrayCollection $addresses
     *
     * @return $this
     */
    public function setAddressCollection(ArrayCollection $addresses = null);

    /**
     * @return ArrayCollection|null
     */
    public function getAddressCollection();

    /**
     * @return bool
     */
    public function hasAddressCollection();

    /**
     * @return $this
     */
    public function clearAddressCollection();

    /**
     * @param ArrayCollection|null $addresses
     *
     * @return $this
     *
     * @deprecated {@see setAddressCollection()}
     */
    public function setAddresses(ArrayCollection $addresses = null);

    /**
     * @return ArrayCollection|null
     *
     * @deprecated {@see getAddressCollection()}
     */
    public function getAddresses();

    /**
     * @return bool
     *
     * @deprecated {@see hasAddressCollection()}
     */
    public function hasAddresses();

    /**
     * @return $this
     *
     * @deprecated {@see clearAddressCollection()}
     */
    public function clearAddresses();

    /**
     * @param Entity $address
     *
     * @return bool
     */
    public function hasAddress(Entity $address);

    /**
     * @param Entity $address
     *
     * @return $this
     */
    public function addAddress(Entity $address);

    /**
     * @param Entity $address
     *
     * @return $this
     */
    public function removeAddress(Entity $address);
}

/* EOF */
