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

namespace SR\Doctrine\ORM\Model\Number;

/**
 * Class ImportanceTrait.
 */
trait ImportanceTrait
{
    /**
     * @var int|null
     */
    protected $importance;

    /**
     * @return string[]
     */
    public function getImportanceLevels()
    {
        return [
           -10 => 'DEPRECATION',
            0 => 'ANNOUNCEMENT',
            10 => 'NOTICE',
            20 => 'WARNING',
            30 => 'IMPORTANT',
            40 => 'CRITICAL',
        ];
    }

    /**
     * @param int $index
     *
     * @return string|null
     */
    public function getImportanceLevelByIndex($index)
    {
        $translations = $this->getImportanceLevels();

        return array_key_exists($index, $translations) ? $translations[$index] : null;
    }

    /**
     * @param string $name
     *
     * @return int|null
     */
    public function getImportanceLevelByName($name)
    {
        $translations = $this->getImportanceLevels();

        return false !== ($index = array_search((string) $name, $translations)) ? $index : null;
    }

    /**
     * @param int $importance
     *
     * @return $this
     */
    public function setImportance($importance)
    {
        if ($this->getImportanceLevelByIndex($importance) !== null) {
            $this->importance = $importance;
        }

        return $this;
    }

    /**
     * @return int
     */
    public function getImportance()
    {
        return $this->importance;
    }

    /**
     * @return bool
     */
    public function hasImportance()
    {
        return $this->importance !== null;
    }

    /**
     * @return $this
     */
    public function clearImportance()
    {
        $this->importance = null;

        return $this;
    }
}

/* EOF */
