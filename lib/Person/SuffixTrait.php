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

namespace SR\Doctrine\ORM\Model\Person;

/**
 * Class SuffixMutatorsTrait.
 */
trait SuffixTrait
{
    /**
     * @var string
     */
    protected $suffix;

    /**
     * @param string $suffix
     *
     * @return $this
     */
    public function setSuffix($suffix)
    {
        $this->suffix = $suffix;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSuffix()
    {
        return $this->suffix;
    }

    /**
     * @return bool
     */
    public function hasSuffix()
    {
        return $this->suffix !== null;
    }

    /**
     * @return $this
     */
    public function clearSuffix()
    {
        $this->suffix = null;

        return $this;
    }
}

/* EOF */
