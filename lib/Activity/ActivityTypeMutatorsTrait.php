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

namespace SR\Doctrine\ORM\Model\Activity;

use SR\Doctrine\ORM\Model\Description\DescriptionMutatorsTrait;
use SR\Doctrine\ORM\Model\SlugMutatorsTrait;
use SR\Doctrine\ORM\Model\Name\NameMutatorsTrait;

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
