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

namespace SR\Doctrine\ORM\Model\Person;

/**
 * Class PersonMutatorsTrait.
 */
trait PersonMutatorsTrait
{
    use HonorificMutatorsTrait;
    use FirstNameMutatorsTrait;
    use MiddleNameMutatorsTrait;
    use SurnameMutatorsTrait;
    use SuffixMutatorsTrait;

    /**
     * Compiles full name string.
     *
     * @return string
     */
    public function getFullName()
    {
        return (string) $this->normalizedString(
            $this->getStringOrEmpty($this->getHonorific()),
            $this->getStringOrEmpty($this->getFirstName()),
            $this->getStringOrEmpty($this->getMiddleName()),
            $this->getStringOrEmpty($this->getSurname()),
            $this->getStringOrEmpty($this->getSuffix())
        );
    }

    /**
     * @return string
     */
    public function getShortName()
    {
        return (string) $this->normalizedString(
            $this->getStringOrEmpty($this->getFirstName()),
            $this->getFirstLetterOrEmpty($this->getMiddleName()),
            $this->getStringOrEmpty($this->getSurname())
        );
    }

    /**
     * @return string
     */
    public function getInitials()
    {
        $initials = $this->normalizedString(
            $this->getFirstLetterOrEmpty($this->getFirstName()),
            $this->getFirstLetterOrEmpty($this->getMiddleName()),
            $this->getFirstLetterOrEmpty($this->getSurname())
        );

        return (string) $this->filterString($initials, '#\s#', '');
    }

    /**
     * @param string $string
     *
     * @return string
     */
    protected function getStringOrEmpty($string)
    {
        return (string) ($string !== null ? $string : '');
    }

    /**
     * @param string $string
     *
     * @return string
     */
    protected function getFirstLetterOrEmpty($string)
    {
        $string = $this->getStringOrEmpty($string);

        return (string) strlen($string) > 0 ? substr($string, 0, 1) : '';
    }

    /**
     * @param string[] $stringSet
     *
     * @return string
     */
    protected function normalizedString(...$stringSet)
    {
        $stringSet = array_filter($stringSet, function($string) {
            return $string !== null;
        });

        array_walk($stringSet, function(&$v) {
            $v = ucfirst($v);
        });

        return (string) $this->filterString(implode(' ', $stringSet));
    }

    /**
     * @param string      $string
     * @param null|string $pattern
     * @param null|string $replace
     *
     * @return string
     */
    protected function filterString($string, $pattern = null, $replace = null)
    {
        $pattern = $pattern !== null ? $pattern : '#\s+#';
        $replace = $replace !== null ? $replace : ' ';

        return null === ($normalized = preg_replace($pattern, $replace, $string)) ? $string : trim($normalized);
    }
}

/* EOF */
