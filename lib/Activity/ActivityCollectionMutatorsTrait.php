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

namespace Scribe\Doctrine\ORM\Model\Activity;

use Doctrine\Common\Collections\ArrayCollection;
use Scribe\Doctrine\ORM\Mapping\Entity;

/**
 * Class ActivityCollectionMutatorTrait.
 */
trait ActivityCollectionMutatorsTrait
{
    /**
     * @var ArrayCollection
     */
    protected $activities;

    /**
     * Initialize trait.
     */
    public function initializeActivityCollection()
    {
        $this->activities = new ArrayCollection();
    }

    /**
     * @param ArrayCollection $activities
     *
     * @return $this
     */
    public function setActivityCollection(ArrayCollection $activities = null)
    {
        $this->activities = $activities;

        return $this;
    }

    /**
     * @return ArrayCollection|null
     */
    public function getActivityCollection()
    {
        return $this->activities;
    }

    /**
     * @return bool
     */
    public function hasActivityCollection()
    {
        return (bool) (false === $this->activities->isEmpty());
    }

    /**
     * @return $this
     */
    public function clearActivityCollection()
    {
        $this->activities = new ArrayCollection();

        return $this;
    }

    /**
     * @param Entity $activity
     *
     * @return bool
     */
    public function hasActivity(Entity $activity)
    {
        return (bool) (true === $this->activities->contains($activity));
    }

    /**
     * @param Entity $activity
     *
     * @return $this
     */
    public function addActivity(Entity $activity)
    {
        if (false === $this->hasActivity($activity)) {
            $this->activities->add($activity);
        }

        return $this;
    }

    /**
     * @param Entity $activity
     *
     * @return $this
     */
    public function removeActivity(Entity $activity)
    {
        if (true === $this->hasActivity($activity)) {
            $this->activities->removeElement($activity);
        }

        return $this;
    }
}

/* EOF */
