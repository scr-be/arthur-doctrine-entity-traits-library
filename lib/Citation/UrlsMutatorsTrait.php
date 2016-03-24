<?php

/*
 * This file is part of the arthur-doctrine-entity-traits-library.
 *
 * (c) Scribe Inc. <scr@src.run>
 * (c) Rob Frawley 2nd <rmf@src.run>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Scribe\Doctrine\ORM\Model\Citation;

/**
 * Class UrlsMutatorsTrait.
 */
trait UrlsMutatorsTrait
{
    /**
     * The urls property.
     *
     * @var array
     */
    protected $urls;

    /**
     * Should be called from constructor of entity using this trait.
     *
     * @return $this
     */
    public function initializeUrls()
    {
        $this->urls = [];

        return $this;
    }

    /**
     * Setter for urls property.
     *
     * @param array|null $urls array of urls
     *
     * @return $this
     */
    public function setUrls(array $urls = null)
    {
        $this->urls = $urls;

        return $this;
    }

    /**
     * Getter for urls property.
     *
     * @return array|null
     */
    public function getUrls()
    {
        return $this->urls;
    }

    /**
     * Checker for urls property.
     *
     * @return bool
     */
    public function hasUrls()
    {
        return (bool) (count((array) $this->getUrls()) > 0);
    }

    /**
     * @param mixed $value value needle to look for
     *
     * @return bool
     */
    public function hasUrl($value)
    {
        return (bool) in_array($value, (array) $this->urls);
    }

    /**
     * @param string $url
     *
     * @return $this
     */
    public function addUrl($url)
    {
        $this->urls = array_merge($this->urls, [$url]);

        return $this;
    }

    /**
     * @param string $url
     *
     * @return $this
     */
    public function removeUrl($url)
    {
        if (false !== ($key = array_search($url, $this->urls))) {
            unset($this->urls[$key]);
        }

        return $this;
    }

    /**
     * @return $this
     */
    public function clearUrls()
    {
        $this->initializeUrls();

        return $this;
    }
}

/* EOF */
