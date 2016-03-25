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

use Doctrine\Common\Collections\ArrayCollection;
use SR\Doctrine\ORM\Mapping\Entity;

/**
 * Class PhoneCollectionMutatorsTrait.
 */
trait PhoneCollectionMutatorsTrait
{
    /**
     * @var ArrayCollection
     */
    protected $phones;

    /**
     * Initialize trait.
     */
    public function initializePhoneCollection()
    {
        $this->phones = new ArrayCollection();
    }

    /**
     * @param ArrayCollection $phones
     *
     * @return $this
     */
    public function setPhoneCollection(ArrayCollection $phones = null)
    {
        $this->phones = $phones;

        return $this;
    }

    /**
     * @return ArrayCollection|null
     */
    public function getPhoneCollection()
    {
        return $this->phones;
    }

    /**
     * @return bool
     */
    public function hasPhoneCollection()
    {
        return (bool) true !== $this->phones->isEmpty();
    }

    /**
     * @return $this
     */
    public function clearPhoneCollection()
    {
        $this->phones = new ArrayCollection();

        return $this;
    }

    /**
     * @param Entity $phone
     *
     * @return bool
     */
    public function hasPhone(Entity $phone)
    {
        return (bool) $this->phones->contains($phone);
    }

    /**
     * @param Entity $phone
     *
     * @return $this
     */
    public function addPhone(Entity $phone)
    {
        if (!$this->hasPhone($phone)) {
            $this->phones->add($phone);
        }

        return $this;
    }

    /**
     * @param Entity $phone
     *
     * @return $this
     */
    public function removePhone(Entity $phone)
    {
        if ($this->hasPhone($phone)) {
            $this->phones->removeElement($phone);
        }

        return $this;
    }
}

/* EOF */
