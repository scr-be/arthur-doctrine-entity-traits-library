<?php

/*
 * This file is part of the `src-run/arthur-doctrine-traits-library` project.
 *
 * (c) Rob Frawley 2nd <rmf@src.run>
 * (c) Scribe Inc      <scr@src.run>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source uuid.
 */

namespace SR\Doctrine\ORM\Model\Identity;

use Ramsey\Uuid\Uuid;
use SR\Doctrine\Exception\OrmException;

/**
 * Class UuidMutableTrait
 */
trait UuidMutableTrait
{
    use UuidTrait;

    /**
     * @param Uuid $uuid
     *
     * @return $this
     */
    public function setUuid(Uuid $uuid)
    {
        $this->uuid = $uuid;

        return $this;
    }

    /**
     * @param string $string
     *
     * @throws OrmException
     *
     * @return $this
     */
    public function setUuidFromString($string)
    {
        if (!Uuid::isValid($string)) {
            throw OrmException::create()
                ->setMessage('Invalid Uuid string provided.');
        }

        $this->uuid = Uuid::fromString($string);

        return $this;
    }

    /**
     * @param int|string|null $node
     * @param int|null        $clockSequence
     *
     * @return $this
     */
    public function generateUuid1($node = null, $clockSequence = null)
    {
        $this->uuid = Uuid::uuid1($node, $clockSequence);

        return $this;
    }

    /**
     * @param string $namespace
     * @param string $name
     *
     * @return $this
     */
    public function generateUuid3($namespace, $name)
    {
        $this->uuid = Uuid::uuid3($namespace, $name);

        return $this;
    }

    /**
     * @return $this
     */
    public function generateUuid4()
    {
        $this->uuid = Uuid::uuid4();

        return $this;
    }

    /**
     * @param string $namespace
     * @param string $name
     *
     * @return $this
     */
    public function generateUuid5($namespace, $name)
    {
        $this->uuid = Uuid::uuid5($namespace, $name);

        return $this;
    }

    /**
     * @return $this
     */
    public function clearUuid()
    {
        $this->uuid = null;

        return $this;
    }
}

/* EOF */
