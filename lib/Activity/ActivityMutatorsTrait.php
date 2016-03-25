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

use SR\Doctrine\ORM\Model\CodeMutatorsTrait;
use SR\Doctrine\ORM\Model\PropertiesMutatorTrait;
use SR\Doctrine\ORM\Model\Type\TypeMutatorsTrait;
use SR\Doctrine\ORM\Model\User\HasUser;

/**
 * Class ActivityMutatorsTrait.
 */
trait ActivityMutatorsTrait
{
    use CodeMutatorsTrait;
    use TypeMutatorsTrait;
    use HasUser;
    use PropertiesMutatorTrait;
}

/* EOF */
