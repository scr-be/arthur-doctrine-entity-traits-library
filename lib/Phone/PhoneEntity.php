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

namespace Scribe\Doctrine\ORM\Model\Phone;

use Scribe\Doctrine\ORM\Mapping\IdEntity;
use Scribe\Doctrine\ORM\Model\Name\NameMutatorsInterface;
use Scribe\Doctrine\ORM\Model\Name\NameMutatorsTrait;
use Scribe\Doctrine\ORM\Model\Type\TypeMutatorsTrait;

/**
 * Class AbstractPhone.
 */
abstract class PhoneEntity extends IdEntity implements PhoneMutatorsInterface, NameMutatorsInterface
{
    use NameMutatorsTrait;
    use TypeMutatorsTrait;
    use PhoneMutatorsTrait;
    use ExtensionMutatorsTrait;
}

/* EOF */
