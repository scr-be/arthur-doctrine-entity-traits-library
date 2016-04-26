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

namespace SR\Doctrine\ORM\Model\Alias;

/**
 * Class AliasesTrait.
 */
trait AliasesTrait
{
    /**
     * @var array
     */
    protected $aliases;

    /**
     * @return $this
     */
    protected function __initializeAliases()
    {
        $this->aliases = [];

        return $this;
    }

    /**
     * @param mixed[] $aliases
     *
     * @return $this
     */
    public function setAliases(array $aliases)
    {
        $this->aliases = $aliases;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAliases()
    {
        return $this->aliases;
    }

    /**
     * @return bool
     */
    public function hasAliases()
    {
        return count($this->aliases) > 0;
    }

    /**
     * @param string $alias
     *
     * @return bool
     */
    public function hasAlias($alias)
    {
        return (bool) in_array($alias, $this->aliases);
    }

    /**
     * @param string $alias
     *
     * @return $this
     */
    public function addAlias($alias)
    {
        $this->aliases = array_merge($this->aliases, [$alias]);

        return $this;
    }

    /**
     * @param string $alias
     *
     * @return $this
     */
    public function removeAlias($alias)
    {
        if (false !== ($key = array_search($alias, $this->aliases))) {
            unset($this->aliases[$key]);
        }

        return $this;
    }

    /**
     * @return $this
     */
    public function clearAliases()
    {
        $this->aliases = [];

        return $this;
    }
}

/* EOF */
