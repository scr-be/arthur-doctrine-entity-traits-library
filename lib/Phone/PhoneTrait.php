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

namespace SR\Doctrine\ORM\Model\Phone;

use SR\Doctrine\ORM\Mapping\IdEntity;
use SR\Doctrine\ORM\Model\Text\NameInterface;
use SR\Doctrine\ORM\Model\Text\NameTrait;
use SR\Doctrine\ORM\Model\Type\TypeTrait;

/**
 * Class PhoneTrait
 */
trait PhoneTrait
{
    use NameTrait;
    use TypeTrait;
    use PhoneNumberTrait;
    use PhoneExtensionTrait;
}

/* EOF */
