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
     * @return Sous_themes
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

    public function __toString()
    {
        return $this->libelleSousTheme;
    }
}
