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

namespace Scribe\Doctrine\ORM\Model\Address;

use Scribe\Doctrine\ORM\Mapping\IdEntity;

/**
 * Class AddressEntity.
 */
abstract class AddressEntity extends IdEntity implements AddressMutatorsInterface
{
    use AddressMutatorsTrait;
}

/* EOF */
