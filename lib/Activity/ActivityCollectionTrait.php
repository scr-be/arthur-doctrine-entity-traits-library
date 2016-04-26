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

namespace SR\Doctrine\ORM\Model\Activity;

use Doctrine\Common\Collections\ArrayCollection;
use SR\Doctrine\ORM\Mapping\Entity;

/**
 * Class ActivityCollectionTrait
 */
trait ActivityCollectionTrait // implements ActivityCollectionMutatorsInterface
{
    /**
     * @var ArrayCollection
     */
    protected $activities;

    /**
     * @return $this
     */
    protected function __initializeActivityCollection()
    {
        $this->activities = new ArrayCollection();

        return $this;
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
        return ! $this->activities->isEmpty();
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
        return $this->activities->contains($activity);
    }

    /**
     * @param Entity $activity
     *
     * @return $this
     */
    public function addActivity(Entity $activity)
    {
        if (!$this->hasActivity($activity)) {
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
        if ($this->hasActivity($activity)) {
            $this->activities->removeElement($activity);
        }

        return $this;
    }
}

/* EOF */
