<?php

/*
 * This file is part of the `src-run/arthur-doctrine-traits-library` project.
 *
 * (c) Rob Frawley 2nd <rmf@src.run>
 * (c) Scribe Inc      <scr@src.run>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source publishedOn.
 */

namespace SR\Doctrine\ORM\Model\Date;

use SR\Doctrine\Exception\OrmException;

/**
 * Class PublishedOnTrait
 */
trait PublishedOnTrait
{
    /**
     * @var \DateTime|null
     */
    protected $publishedOn;

    /**
     * @param \DateTime $publishedOn
     *
     * @return $this
     */
    public function setPublishedOn(\DateTime $publishedOn)
    {
        $this->publishedOn = $publishedOn;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getPublishedOn()
    {
        return $this->publishedOn;
    }

    /**
     * @param string $format
     *
     * @throws OrmException
     *
     * @return string
     */
    public function formatPublishedOn($format)
    {
        if (!$this->hasPublishedOn()) {
            throw OrmException::create()
                ->setMessage('Cannot format publishedOn when no \DateTime is set for %s in %s.')
                ->with(get_called_class(), __METHOD__);
        }

        return $this->publishedOn->format($format);
    }

    /**
     * @return bool
     */
    public function hasPublishedOn()
    {
        return $this->publishedOn !== null;
    }

    /**
     * @return $this
     */
    public function clearPublishedOn()
    {
        $this->publishedOn = null;

        return $this;
    }
}

/* EOF */
