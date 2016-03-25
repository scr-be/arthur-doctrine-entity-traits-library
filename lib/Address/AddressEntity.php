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

namespace SR\Doctrine\ORM\Model\Address;

use SR\Doctrine\ORM\Mapping\IdEntity;

/**
 * Class AddressEntity.
 */
abstract class AddressEntity extends IdEntity implements AddressMutatorsInterface
{
    use AddressMutatorsTrait;
}

/* EOF */
