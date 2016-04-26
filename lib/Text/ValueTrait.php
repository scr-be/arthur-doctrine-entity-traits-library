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
 * Class ValueTrait.
 */
trait ValueTrait
{
    /**
     * @var string|null
     */
    protected $value;

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return bool
     */
    public function hasValue()
    {
        return $this->value !== null;
    }

    /**
     * @return $this
     */
    public function clearValue()
    {
        $this->value = null;

        return $this;
    }
}

/* EOF */
