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

namespace SR\Doctrine\ORM\Model\Identity;

/**
 * Class SlugMutatorsTrait.
 */
trait SlugMutatorsTrait
{
    /**
     * The slug property.
     *
     * @var string
     */
    protected $slug;

    /**
     * Init trait.
     */
    public function initializeSlug()
    {
        $this->slug = null;
    }

    /**
     * Setter for slug property.
     *
     * @param string|null $slug the slug string
     *
     * @return $this
     */
    public function setSlug($slug = null)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Getter for slug property.
     *
     * @return string|null
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Checker for slug property.
     *
     * @return bool
     */
    public function hasSlug()
    {
        return (bool) ($this->getSlug() !== null);
    }

    /**
     * Nullify the slug property.
     *
     * @return $this
     */
    public function clearSlug()
    {
        $this->setSlug(null);

        return $this;
    }
}

/* EOF */
