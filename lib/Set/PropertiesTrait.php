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

namespace SR\Doctrine\ORM\Model\Set;

/**
 * Class PropertiesMutatorsTrait.
 */
trait PropertiesTrait
{
    /**
     * @var mixed[]
     */
    protected $properties;

    /**
     * @return $this
     */
    protected function __initializeProperties()
    {
        $this->properties = [];

        return $this;
    }

    /**
     * @param mixed[] $properties
     *
     * @return $this
     */
    public function setProperties(array $properties)
    {
        $this->properties = $properties;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * @return bool
     */
    public function hasProperties()
    {
        return count($this->properties) > 0;
    }

    /**
     * @return $this
     */
    public function clearProperties()
    {
        $this->__initializeProperties();

        return $this;
    }

    /**
     * @param mixed $property
     *
     * @return bool
     */
    public function hasPropertyByValue($property)
    {
        return in_array($property, $this->properties);
    }

    /**
     * @param string $index
     *
     * @return bool
     */
    public function hasProperty($index)
    {
        return array_key_exists($index, $this->properties);
    }

    /**
     * @param string $index
     *
     * @return string|null
     */
    public function getProperty($index)
    {
        return $this->hasProperty($index) ? $this->properties[$index] : null;
    }

    /**
     * @param mixed  $property
     * @param string $index
     *
     * @return $this
     */
    public function setProperty($property, $index = null)
    {
        if ($index === null) {
            $this->properties[] = $property;
        } else {
            $this->properties[$index] = $property;
        }

        return $this;
    }

    /**
     * @param string $index
     *
     * @return $this
     */
    public function removeProperty($index)
    {
        if ($this->hasProperty($index)) {
            unset($this->properties[$index]);
        }

        return $this;
    }

    /**
     * @param string $index
     *
     * @return $this
     */
    public function removePropertyByValue($property)
    {
        if (false !== $index = array_search($property, $this->properties)) {
            unset($this->properties[$index]);
        }

        return $this;
    }
}

/* EOF */
