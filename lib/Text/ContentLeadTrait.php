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
 * Class ContentLeadTrait.
 */
trait ContentLeadTrait
{
    /**
     * @var string
     */
    protected $lead;

    /**
     * @param string $lead
     *
     * @return $this
     */
    public function setLead($lead)
    {
        $this->lead = $lead;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLead()
    {
        return $this->lead;
    }

    /**
     * @return bool
     */
    public function hasLead()
    {
        return $this->lead !== null;
    }

    /**
     * @return $this
     */
    public function clearLead()
    {
        $this->lead = null;

        return $this;
    }
}

/* EOF */
