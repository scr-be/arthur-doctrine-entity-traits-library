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
 * Class PhoneCollectionInverseSideTrait.
 */
trait PhoneCollectionInverseSideTrait
{
    /**
     * @var ArrayCollection
     */
    protected $phones;

    /**
     * @return $this
     */
    protected function initializePhoneCollection()
    {
        $this->phones = new ArrayCollection();

        return $this;
    }

    /**
     * @return ArrayCollection
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
        return !$this->phones->isEmpty();
    }

    /**
     * @param Entity $phone
     *
     * @return bool
     */
    public function hasPhone(Entity $phone)
    {
        return $this->phones->contains($phone);
    }
}

/* EOF */
