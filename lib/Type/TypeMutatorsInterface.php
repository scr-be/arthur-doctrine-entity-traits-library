<?php

/*
 * This file is part of the `src-run/arthur-doctrine-entity-traits-library` project.
 *
 * (c) Rob Frawley 2nd <rmf@src.run>
 * (c) Scribe Inc      <scr@src.run>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace SR\Doctrine\ORM\Model\Type;

/**
 * Class TypeInterface.
 */
interface TypeMutatorsInterface
{
    /**
     * @return mixed|null
     */
    public function getType();

    /**
     * @param mixed|null $type
     *
     * @return $this
     */
    public function setType($type = null);

    /**
     * @return bool
     */
    public function hasType();

    /**
     * @return $this
     */
    public function clearType();
}

/* EOF */
