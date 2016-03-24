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

use Scribe\Doctrine\ORM\Model\CodeMutatorsTrait;
use Scribe\Doctrine\ORM\Model\PropertiesMutatorTrait;
use Scribe\Doctrine\ORM\Model\Type\TypeMutatorsTrait;
use Scribe\Doctrine\ORM\Model\User\HasUser;

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
