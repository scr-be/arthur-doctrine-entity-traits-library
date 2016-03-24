<?php

/*
 * This file is part of the arthur-doctrine-entity-traits-library.
 *
 * (c) Scribe Inc. <scr@src.run>
 * (c) Rob Frawley 2nd <rmf@src.run>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Scribe\Doctrine\ORM\Model\Phone;

use Scribe\Wonka\Utility\Filter\StringFilter;

/**
 * Class PhoneMutatorsTrait.
 */
trait PhoneMutatorsTrait
{
    /**
     * @var string|null
     */
    protected $number;

    /**
     * @return $this
     */
    public function initializeNumber()
    {
        $this->number = null;

        return $this;
    }

    /**
     * @param string $number
     *
     * @return $this
     */
    public function setNumber($number)
    {
        $this->number = StringFilter::parsePhoneString($number);

        return $this;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return (string) $this->number;
    }

    /**
     * @return bool
     */
    public function hasNumber()
    {
        return $this->number !== null;
    }

    /**
     * @return $this
     */
    public function clearNumber()
    {
        $this->initializeNumber();

        return $this;
    }

    /**
     * @return string
     */
    public function getNumberFormatted()
    {
        return (string) StringFilter::formatPhoneString($this->number);
    }
}

/* EOF */
