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

namespace SR\Doctrine\ORM\Model\Phone;

use SR\Utility\StringUtil;

/**
 * Class PhoneNumberTrait
 */
trait PhoneNumberTrait
{
    /**
     * @var string|null
     */
    protected $number;

    /**
     * @param string $number
     *
     * @return $this
     */
    public function setNumber($number)
    {
        $this->number = StringUtil::toPhoneNumber($number);

        return $this;
    }

    /**
     * @return string|null
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function getNumberFormatted()
    {
        return (string) StringUtil::toPhoneNumberFormatted($this->number);
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
        $this->number = null;

        return $this;
    }
}

/* EOF */
