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
     * @return Themes
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
        return $this->libelleTheme;
    }
}
