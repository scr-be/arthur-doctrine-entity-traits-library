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

use SR\Doctrine\ORM\Model\General\CodeTrait;
use SR\Doctrine\ORM\Model\Set\PropertiesTrait;
use SR\Doctrine\ORM\Model\Type\TypeTrait;

/**
 * Class ActivityTrait
 */
trait ActivityTrait
{
    use TypeTrait;
    use CodeTrait;
    use PropertiesTrait;
}

/* EOF */
