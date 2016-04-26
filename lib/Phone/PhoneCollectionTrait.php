<?php

/*
 * This file is part of the `src-run/arthur-doctrine-traits-library` project.
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
 * Class PhoneCollectionTrait
 */
trait PhoneCollectionTrait
{
    use PhoneCollectionInverseSideTrait;

    /**
     * @param ArrayCollection $phones
     *
     * @return $this
     */
    public function setPhoneCollection(ArrayCollection $phones)
    {
        $this->phones = $phones;

        return $this;
    }

    /**
     * @return $this
     */
    public function clearPhoneCollection()
    {
        $this->__initializePhoneCollection();

        return $this;
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
