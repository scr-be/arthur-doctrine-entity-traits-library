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

namespace SR\Doctrine\ORM\Model\General;

/**
 * Class CodeTrait
 */
trait CodeTrait
{
    /**
     * @var string
     */
    protected $code;

    /**
     * @param string $code
     *
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return bool
     */
    public function hasCode()
    {
        return $this->code !== null;
    }

    /**
     * @return $this
     */
    public function clearCode()
    {
        $this->code = null;

        return $this;
    }
}

/* EOF */
