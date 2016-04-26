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

namespace SR\Doctrine\ORM\Model\Activity;

use Doctrine\Common\Collections\ArrayCollection;
use SR\Doctrine\ORM\Mapping\Entity;

/**
 * Class ActivityCollectionInterface.
 */
interface ActivityCollectionInterface
{
    /**
     * @param ArrayCollection $activities
     *
     * @return $this
     */
    public function setActivityCollection(ArrayCollection $activities = null);

    /**
     * @return ArrayCollection|null
     */
    public function getActivityCollection();

    /**
     * @return bool
     */
    public function hasActivityCollection();

    /**
     * @return $this
     */
    public function clearActivityCollection();

    /**
     * @param Entity $activity
     *
     * @return bool
     */
    public function hasActivity(Entity $activity);

    /**
     * @param Entity $activity
     *
     * @return $this
     */
    public function addActivity(Entity $activity);

    /**
     * @param Entity $activity
     *
     * @return $this
     */
    public function removeActivity(Entity $activity);
}

/* EOF */
