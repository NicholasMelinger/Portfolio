<?php

namespace PortfolioBundle\Entity;

/**
 * Sous_sous_themes
 */
class Sous_sous_themes
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $libelleSousSousTheme;


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
     * Set libelleSousSousTheme
     *
     * @param string $libelleSousSousTheme
     *
     * @return Sous_sous_themes
     */
    public function setLibelleSousSousTheme($libelleSousSousTheme)
    {
        $this->libelleSousSousTheme = $libelleSousSousTheme;

        return $this;
    }

    /**
     * Get libelleSousSousTheme
     *
     * @return string
     */
    public function getLibelleSousSousTheme()
    {
        return $this->libelleSousSousTheme;
    }
}

