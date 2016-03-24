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

namespace Scribe\Doctrine\ORM\Model\Activity;

use Scribe\Doctrine\ORM\Model\Description\DescriptionMutatorsTrait;
use Scribe\Doctrine\ORM\Model\SlugMutatorsTrait;
use Scribe\Doctrine\ORM\Model\Name\NameMutatorsTrait;

/**
 * Class ActivityTypeMutatorsTrait.
 */
trait ActivityTypeMutatorsTrait
{
    use SlugMutatorsTrait;
    use NameMutatorsTrait;
    use DescriptionMutatorsTrait;
}

/* EOF */
