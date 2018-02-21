<?php

namespace PortfolioBundle\Entity;

/**
 * Sous_themes
 */
class Sous_themes
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $libelleSousTheme;


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
     * Set libelleSousTheme
     *
     * @param string $libelleSousTheme
     *
     * @return Sous_themes
     */
    public function setLibelleSousTheme($libelleSousTheme)
    {
        $this->libelleSousTheme = $libelleSousTheme;

        return $this;
    }

    /**
     * Get libelleSousTheme
     *
     * @return string
     */
    public function getLibelleSousTheme()
    {
        return $this->libelleSousTheme;
    }
}

