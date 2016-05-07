<?php

/*
 * This file is part of the `src-run/arthur-doctrine-traits-library` project.
 *
 * (c) Rob Frawley 2nd <rmf@src.run>
 * (c) Scribe Inc      <scr@src.run>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source publishOn.
 */

namespace SR\Doctrine\ORM\Model\Date;

use SR\Doctrine\Exception\OrmException;

/**
 * Class PublishOnTrait.
 */
trait PublishOnTrait
{
    /**
     * @var \DateTime|null
     */
    protected $publishOn;

    /**
     * @param \DateTime $publishOn
     *
     * @return $this
     */
    public function setPublishOn(\DateTime $publishOn)
    {
        $this->publishOn = $publishOn;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getPublishOn()
    {
        return $this->publishOn;
    }

    /**
     * @return bool
     */
    public function isPublished()
    {
        if (null === $this->publishOn) {
            return false;
        }

        return $this->publishOn <= (new \Datetime());
    }

    /**
     * @return $this
     */
    public function publish()
    {
        $this->publishOn = new \Datetime();

        return $this;
    }

    /**
     * @return $this
     */
    public function unPublish()
    {
        $this->publishOn = null;

        return $this;
    }

    /**
     * @param string $format
     *
     * @throws OrmException
     *
     * @return string
     */
    public function formatPublishOn($format)
    {
        if (!$this->hasPublishOn()) {
            throw OrmException::create()
                ->setMessage('Cannot format publishOn when no \DateTime is set for %s in %s.')
                ->with(get_called_class(), __METHOD__);
        }

        return $this->publishOn->format($format);
    }

    /**
     * @return bool
     */
    public function hasPublishOn()
    {
        return $this->publishOn !== null;
    }

    /**
     * @return $this
     */
    public function clearPublishOn()
    {
        $this->publishOn = null;

        return $this;
    }
}

/* EOF */
