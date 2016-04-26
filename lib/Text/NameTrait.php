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
 * Class NameTrait
 */
trait NameTrait
{
    /**
     * The name property.
     *
     * @var string
     */
    protected $name;

    /**
     * @param string
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function hasName()
    {
        return $this->name !== null;
    }

    /**
     * @return $this
     */
    public function clearName()
    {
        $this->name = null;

        return $this;
    }
}

/* EOF */
