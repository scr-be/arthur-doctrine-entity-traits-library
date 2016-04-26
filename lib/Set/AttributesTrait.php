<?php

/*
 * This file is part of the `src-run/arthur-doctrine-traits-library` project.
 *
 * (c) Rob Frawley 2nd <rmf@src.run>
 * (c) Scribe Inc      <scr@src.run>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace SR\Doctrine\ORM\Model\Set;

/**
 * Class AttributesMutatorsTrait.
 */
trait AttributesTrait
{
    /**
     * @var mixed[]
     */
    protected $attributes;

    /**
     * @return $this
     */
    protected function __initializeAttributes()
    {
        $this->attributes = [];

        return $this;
    }

    /**
     * @param mixed[] $attributes
     *
     * @return $this
     */
    public function setAttributes(array $attributes)
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @return bool
     */
    public function hasAttributes()
    {
        return count($this->attributes) > 0;
    }

    /**
     * @return $this
     */
    public function clearAttributes()
    {
        $this->__initializeAttributes();

        return $this;
    }

    /**
     * @param mixed $attribute
     *
     * @return bool
     */
    public function hasAttributeByValue($attribute)
    {
        return in_array($attribute, $this->attributes);
    }

    /**
     * @param string $index
     *
     * @return bool
     */
    public function hasAttribute($index)
    {
        return array_key_exists($index, $this->attributes);
    }

    /**
     * @param string $index
     *
     * @return string|null
     */
    public function getAttribute($index)
    {
        return $this->hasAttribute($index) ? $this->attributes[$index] : null;
    }

    /**
     * @param mixed  $attribute
     * @param string $index
     *
     * @return $this
     */
    public function setAttribute($attribute, $index = null)
    {
        if ($index === null) {
            $this->attributes[] = $attribute;
        } else {
            $this->attributes[$index] = $attribute;
        }

        return $this;
    }

    /**
     * @param string $index
     *
     * @return $this
     */
    public function removeAttribute($index)
    {
        if ($this->hasAttribute($index)) {
            unset($this->attributes[$index]);
        }

        return $this;
    }

    /**
     * @param string $index
     *
     * @return $this
     */
    public function removeAttributeByValue($attribute)
    {
        if (false !== $index = array_search($attribute, $this->attributes)) {
            unset($this->attributes[$index]);
        }

        return $this;
    }
}

/* EOF */
