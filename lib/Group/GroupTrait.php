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

namespace SR\Doctrine\ORM\Model\Group;

/**
 * Class GroupTrait
 */
trait GroupTrait
{
    /**
     * @var string
     */
    protected $group;

    /**
     * @param string $group
     *
     * @return $this
     */
    public function setGroup($group)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @return bool
     */
    public function hasGroup()
    {
        return $this->group !== null;
    }

    /**
     * @return $this
     */
    public function clearGroup()
    {
        $this->group = null;

        return $this;
    }
}

/* EOF */
