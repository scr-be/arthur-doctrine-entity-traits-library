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
 * Class ContentTrait.
 */
trait ContentTrait
{
    /**
     * @var string
     */
    protected $content;

    /**
     * @param string $content
     *
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return bool
     */
    public function hasContent()
    {
        return $this->content !== null;
    }

    /**
     * @return $this
     */
    public function clearContent()
    {
        $this->content = null;

        return $this;
    }
}

/* EOF */
