<?php

namespace PortfolioBundle\Entity;

/**
 * Themes
 */
class Themes
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $libelleTheme;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set libelleTheme
     *
     * @param string $libelleTheme
     *
     * @return Themes
     */
    public function setLibelleTheme($libelleTheme)
    {
        $this->libelleTheme = $libelleTheme;

        return $this;
    }

    /**
     * Get libelleTheme
     *
     * @return string
     */
    public function getLibelleTheme()
    {
        return $this->libelleTheme;
    }
}

