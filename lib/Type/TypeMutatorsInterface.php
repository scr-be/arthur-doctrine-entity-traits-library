<?php

/*
 * This file is part of the arthur-doctrine-mixed-traits-library.
 *
 * (c) Scribe Inc. <https://scribe.software>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Scribe\Doctrine\ORM\Model\Type;

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
