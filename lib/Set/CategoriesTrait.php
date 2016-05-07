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
 * Class CategoriesMutatorsTrait.
 */
trait CategoriesTrait
{
    /**
     * @var mixed[]
     */
    protected $categories;

    /**
     * @return $this
     */
    protected function initializeCategories()
    {
        $this->categories = [];

        return $this;
    }

    /**
     * @param mixed[] $categories
     *
     * @return $this
     */
    public function setCategories(array $categories)
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @return bool
     */
    public function hasCategories()
    {
        return count($this->categories) > 0;
    }

    /**
     * @return $this
     */
    public function clearCategories()
    {
        $this->initializeCategories();

        return $this;
    }

    /**
     * @param mixed $category
     *
     * @return bool
     */
    public function hasCategoryByValue($category)
    {
        return in_array($category, $this->categories);
    }

    /**
     * @param string $index
     *
     * @return bool
     */
    public function hasCategory($index)
    {
        return array_key_exists($index, $this->categories);
    }

    /**
     * @param string $index
     *
     * @return string|null
     */
    public function getCategory($index)
    {
        return $this->hasCategory($index) ? $this->categories[$index] : null;
    }

    /**
     * @param mixed  $category
     * @param string $index
     *
     * @return $this
     */
    public function setCategory($category, $index = null)
    {
        if ($index === null) {
            $this->categories[] = $category;
        } else {
            $this->categories[$index] = $category;
        }

        return $this;
    }

    /**
     * @param string $index
     *
     * @return $this
     */
    public function removeCategory($index)
    {
        if ($this->hasCategory($index)) {
            unset($this->categories[$index]);
        }

        return $this;
    }

    /**
     * @param string $index
     *
     * @return $this
     */
    public function removeCategoryByValue($category)
    {
        if (false !== $index = array_search($category, $this->categories)) {
            unset($this->categories[$index]);
        }

        return $this;
    }
}

/* EOF */
