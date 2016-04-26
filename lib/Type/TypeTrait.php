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

namespace SR\Doctrine\ORM\Model\Type;

/**
 * Class TypeTrait.
 */
trait TypeTrait
{
    /**
     * @var mixed|null
     */
    protected $type;

    /**
     * @return mixed|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasType()
    {
        return $this->type !== null;
    }

    /**
     * @return $this
     */
    public function clearType()
    {
        $this->type = null;

        return $this;
    }
}

/* EOF */
