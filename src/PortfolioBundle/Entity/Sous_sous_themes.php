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
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $matrice;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->matrice = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add matrice
     *
     * @param \PortfolioBundle\Entity\Matrice $matrice
     *
     * @return Sous_sous_themes
     */
    public function addMatrice(\PortfolioBundle\Entity\Matrice $matrice)
    {
        $this->matrice[] = $matrice;

        return $this;
    }

    /**
     * Remove matrice
     *
     * @param \PortfolioBundle\Entity\Matrice $matrice
     */
    public function removeMatrice(\PortfolioBundle\Entity\Matrice $matrice)
    {
        $this->matrice->removeElement($matrice);
    }

    /**
     * Get matrice
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMatrice()
    {
        return $this->matrice;
    }
}
