<?php

/*
 * This file is part of the `src-run/arthur-doctrine-traits-library` project.
 *
 * (c) Rob Frawley 2nd <rmf@src.run>
 * (c) Scribe Inc      <scr@src.run>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source createdOn.
 */

namespace SR\Doctrine\ORM\Model\Date;

use SR\Doctrine\Exception\OrmException;

/**
 * Class CreatedOnTrait
 */
trait CreatedOnTrait
{
    /**
     * @var \DateTime|null
     */
    protected $createdOn;

    /**
     * @param \DateTime $createdOn
     *
     * @return $this
     */
    public function setCreatedOn(\DateTime $createdOn)
    {
        $this->createdOn = $createdOn;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     * @param string $format
     *
     * @throws OrmException
     *
     * @return string
     */
    public function formatCreatedOn($format)
    {
        if (!$this->hasCreatedOn()) {
            throw OrmException::create()
                ->setMessage('Cannot format createdOn when no \DateTime is set for %s in %s.')
                ->with(get_called_class(), __METHOD__);
        }

        return $this->createdOn->format($format);
    }

    /**
     * @return bool
     */
    public function hasCreatedOn()
    {
        return $this->createdOn !== null;
    }

    /**
     * @return $this
     */
    public function clearCreatedOn()
    {
        $this->createdOn = null;

        return $this;
    }
}

/* EOF */
