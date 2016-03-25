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
 * Class TitleMutatorsTrait.
 */
trait TitleMutatorsTrait
{
    /**
     * The title property.
     *
     * @var string
     */
    protected $title;

    /**
     * Init trait.
     */
    public function initializeTitle()
    {
        $this->title = null;
    }

    /**
     * Setter for title property.
     *
     * @param string|null $title your title string
     *
     * @return $this
     */
    public function setTitle($title = null)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Getter for title property.
     *
     * @return string|null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Checker for title property.
     *
     * @return bool
     */
    public function hasTitle()
    {
        return (bool) ($this->getTitle() !== null);
    }

    /**
     * Nullify the title property.
     *
     * @return $this
     */
    public function clearTitle()
    {
        $this->setTitle(null);

        return $this;
    }
}

/* EOF */
