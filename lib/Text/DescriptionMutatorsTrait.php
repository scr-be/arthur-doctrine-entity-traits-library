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

namespace SR\Doctrine\ORM\Model\Text;

/**
 * Class DescriptionMutatorsTrait.
 */
trait DescriptionMutatorsTrait
{
    /**
     * @var string
     */
    protected $description;

    /**
     * Init trait.
     */
    public function initializeDescription()
    {
        $this->description = null;
    }

    /**
     * @param string|null $description
     *
     * @return $this
     */
    public function setDescription($description = null)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return bool
     */
    public function hasDescription()
    {
        return (bool) ($this->description !== null);
    }

    /**
     * @return $this
     */
    public function clearDescription()
    {
        $this->description = null;

        return $this;
    }
}

/* EOF */
