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
 * Class ParametersMutatorsTrait.
 */
trait ParametersTrait
{
    /**
     * @var mixed[]
     */
    protected $parameters;

    /**
     * @return $this
     */
    protected function __initializeParameters()
    {
        $this->parameters = [];

        return $this;
    }

    /**
     * @param mixed[] $parameters
     *
     * @return $this
     */
    public function setParameters(array $parameters)
    {
        $this->parameters = $parameters;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @return bool
     */
    public function hasParameters()
    {
        return count($this->parameters) > 0;
    }

    /**
     * @return $this
     */
    public function clearParameters()
    {
        $this->__initializeParameters();

        return $this;
    }

    /**
     * @param mixed $parameter
     *
     * @return bool
     */
    public function hasParameterByValue($parameter)
    {
        return in_array($parameter, $this->parameters);
    }

    /**
     * @param string $index
     *
     * @return bool
     */
    public function hasParameter($index)
    {
        return array_key_exists($index, $this->parameters);
    }

    /**
     * @param string $index
     *
     * @return string|null
     */
    public function getParameter($index)
    {
        return $this->hasParameter($index) ? $this->parameters[$index] : null;
    }

    /**
     * @param mixed  $parameter
     * @param string $index
     *
     * @return $this
     */
    public function setParameter($parameter, $index = null)
    {
        if ($index === null) {
            $this->parameters[] = $parameter;
        } else {
            $this->parameters[$index] = $parameter;
        }

        return $this;
    }

    /**
     * @param string $index
     *
     * @return $this
     */
    public function removeParameter($index)
    {
        if ($this->hasParameter($index)) {
            unset($this->parameters[$index]);
        }

        return $this;
    }

    /**
     * @param string $index
     *
     * @return $this
     */
    public function removeParameterByValue($parameter)
    {
        if (false !== $index = array_search($parameter, $this->parameters)) {
            unset($this->parameters[$index]);
        }

        return $this;
    }
}

/* EOF */
