<?php

/*
 * This file is part of the arthur-doctrine-entity-traits-library.
 *
 * (c) Scribe Inc. <scr@src.run>
 * (c) Rob Frawley 2nd <rmf@src.run>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Scribe\Doctrine\ORM\Model\Phone;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class PhoneCollectionInterface.
 */
interface PhoneCollectionInterface
{
    /**
     * @param ArrayCollection $phones
     *
     * @return $this
     */
    public function setPhoneCollection(ArrayCollection $phones = null);

    /**
     * @return ArrayCollection|null
     */
    public function getPhoneCollection();

    /**
     * @return bool
     */
    public function hasPhoneCollection();

    /**
     * @return $this
     */
    public function clearPhoneCollection();

    /**
     * @param ArrayCollection|null $phones
     *
     * @return $this
     *
     * @deprecated {@see setPhoneCollection()}
     */
    public function setPhones(ArrayCollection $phones = null);

    /**
     * @return ArrayCollection|null
     *
     * @deprecated {@see getPhoneCollection()}
     */
    public function getPhones();

    /**
     * @return bool
     *
     * @deprecated {@see hasPhoneCollection()}
     */
    public function hasPhones();

    /**
     * @return $this
     *
     * @deprecated {@see clearPhoneCollection()}
     */
    public function clearPhones();

    /**
     * @param PhoneMutatorsInterface $phone
     *
     * @return bool
     */
    public function hasPhone(PhoneMutatorsInterface $phone);

    /**
     * @param PhoneMutatorsInterface $phone
     *
     * @return $this
     */
    public function addPhone(PhoneMutatorsInterface $phone);

    /**
     * @param PhoneMutatorsInterface $phone
     *
     * @return $this
     */
    public function removePhone(PhoneMutatorsInterface $phone);
}

/* EOF */
