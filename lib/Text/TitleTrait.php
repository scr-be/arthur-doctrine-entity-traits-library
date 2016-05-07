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

namespace SR\Doctrine\ORM\Model\Text;

/**
 * Class TitleTrait.
 */
trait TitleTrait
{
    /**
     * @var string|null
     */
    protected $title;

    /**
     * @param string $title
     *
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return bool
     */
    public function hasTitle()
    {
        return $this->title !== null;
    }

    /**
     * @return $this
     */
    public function clearTitle()
    {
        $this->title = null;

        return $this;
    }
}

/* EOF */
