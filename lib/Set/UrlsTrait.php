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
 * Class UrlsMutatorsTrait.
 */
trait UrlsTrait
{
    /**
     * @var mixed[]
     */
    protected $urls;

    /**
     * @return $this
     */
    protected function __initializeUrls()
    {
        $this->urls = [];

        return $this;
    }

    /**
     * @param mixed[] $urls
     *
     * @return $this
     */
    public function setUrls(array $urls)
    {
        $this->urls = $urls;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getUrls()
    {
        return $this->urls;
    }

    /**
     * @return bool
     */
    public function hasUrls()
    {
        return count($this->urls) > 0;
    }

    /**
     * @return $this
     */
    public function clearUrls()
    {
        $this->__initializeUrls();

        return $this;
    }

    /**
     * @param mixed $url
     *
     * @return bool
     */
    public function hasUrlByValue($url)
    {
        return in_array($url, $this->urls);
    }

    /**
     * @param string $index
     *
     * @return bool
     */
    public function hasUrl($index)
    {
        return array_key_exists($index, $this->urls);
    }

    /**
     * @param string $index
     *
     * @return string|null
     */
    public function getUrl($index)
    {
        return $this->hasUrl($index) ? $this->urls[$index] : null;
    }

    /**
     * @param mixed  $url
     * @param string $index
     *
     * @return $this
     */
    public function setUrl($url, $index = null)
    {
        if ($index === null) {
            $this->urls[] = $url;
        } else {
            $this->urls[$index] = $url;
        }

        return $this;
    }

    /**
     * @param string $index
     *
     * @return $this
     */
    public function removeUrl($index)
    {
        if ($this->hasUrl($index)) {
            unset($this->urls[$index]);
        }

        return $this;
    }

    /**
     * @param string $index
     *
     * @return $this
     */
    public function removeUrlByValue($url)
    {
        if (false !== $index = array_search($url, $this->urls)) {
            unset($this->urls[$index]);
        }

        return $this;
    }
}

/* EOF */
