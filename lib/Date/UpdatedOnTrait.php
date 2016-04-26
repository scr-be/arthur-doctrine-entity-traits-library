<?php

/*
 * This file is part of the `src-run/arthur-doctrine-traits-library` project.
 *
 * (c) Rob Frawley 2nd <rmf@src.run>
 * (c) Scribe Inc      <scr@src.run>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source updatedOn.
 */

namespace SR\Doctrine\ORM\Model\Date;

use SR\Doctrine\Exception\OrmException;

/**
 * Class UpdatedOnTrait
 */
trait UpdatedOnTrait
{
    /**
     * @var \DateTime|null
     */
    protected $updatedOn;

    /**
     * @param \DateTime $updatedOn
     *
     * @return $this
     */
    public function setUpdatedOn(\DateTime $updatedOn)
    {
        $this->updatedOn = $updatedOn;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getUpdatedOn()
    {
        return $this->updatedOn;
    }

    /**
     * @param string $format
     *
     * @throws OrmException
     *
     * @return string
     */
    public function formatUpdatedOn($format)
    {
        if (!$this->hasUpdatedOn()) {
            throw OrmException::create()
                ->setMessage('Cannot format updatedOn when no \DateTime is set for %s in %s.')
                ->with(get_called_class(), __METHOD__);
        }

        return $this->updatedOn->format($format);
    }

    /**
     * @return bool
     */
    public function hasUpdatedOn()
    {
        return $this->updatedOn !== null;
    }

    /**
     * @return $this
     */
    public function clearUpdatedOn()
    {
        $this->updatedOn = null;

        return $this;
    }
}

/* EOF */
