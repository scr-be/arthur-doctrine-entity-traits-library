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

namespace Scribe\Doctrine\ORM\Model\Text;

/**
 * Class DescriptionMutatorsInterface.
 */
interface DescriptionMutatorsInterface
{
    /**
     * @param string|null $description
     *
     * @return $this
     */
    public function setDescription($description = null);

    /**
     * @return string|null
     */
    public function getDescription();

    /**
     * @return bool
     */
    public function hasDescription();

    /**
     * @return $this
     */
    public function clearDescription();
}

/* EOF */
