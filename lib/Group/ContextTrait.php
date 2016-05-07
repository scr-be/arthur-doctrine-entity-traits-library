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

namespace SR\Doctrine\ORM\Model\Group;

/**
 * Class ContextTrait.
 */
trait ContextTrait
{
    /**
     * @var string
     */
    protected $context;

    /**
     * @param string $context
     *
     * @return $this
     */
    public function setContext($context)
    {
        $this->context = $context;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @return bool
     */
    public function hasContext()
    {
        return $this->context !== null;
    }

    /**
     * @return $this
     */
    public function clearContext()
    {
        $this->context = null;

        return $this;
    }
}

/* EOF */
