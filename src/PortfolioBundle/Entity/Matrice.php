<?php

namespace PortfolioBundle\Entity;

/**
 * Matrice
 */
class Matrice
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $flagActif;


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
     * Set flagActif
     *
     * @param integer $flagActif
     *
     * @return Matrice
     */
    public function setFlagActif($flagActif)
    {
        $this->flagActif = $flagActif;

        return $this;
    }

    /**
     * Get flagActif
     *
     * @return int
     */
    public function getFlagActif()
    {
        return $this->flagActif;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $competences;

    /**
     * @var \PortfolioBundle\Entity\Themes
     */
    private $theme_matrice;

    /**
     * @var \PortfolioBundle\Entity\Sous_themes
     */
    private $s_theme_matrice;

    /**
     * @var \PortfolioBundle\Entity\Sous_sous_themes
     */
    private $s_s_theme_matrice;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->competences = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add competence
     *
     * @param \PortfolioBundle\Entity\Competences $competence
     *
     * @return Matrice
     */
    public function addCompetence(\PortfolioBundle\Entity\Competences $competence)
    {
        $this->competences[] = $competence;

        return $this;
    }

    /**
     * Remove competence
     *
     * @param \PortfolioBundle\Entity\Competences $competence
     */
    public function removeCompetence(\PortfolioBundle\Entity\Competences $competence)
    {
        $this->competences->removeElement($competence);
    }

    /**
     * Get competences
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCompetences()
    {
        return $this->competences;
    }

    /**
     * Set themeMatrice
     *
     * @param \PortfolioBundle\Entity\Themes $themeMatrice
     *
     * @return Matrice
     */
    public function setThemeMatrice(\PortfolioBundle\Entity\Themes $themeMatrice = null)
    {
        $this->theme_matrice = $themeMatrice;

        return $this;
    }

    /**
     * Get themeMatrice
     *
     * @return \PortfolioBundle\Entity\Themes
     */
    public function getThemeMatrice()
    {
        return $this->theme_matrice;
    }

    /**
     * Set sThemeMatrice
     *
     * @param \PortfolioBundle\Entity\Sous_themes $sThemeMatrice
     *
     * @return Matrice
     */
    public function setSThemeMatrice(\PortfolioBundle\Entity\Sous_themes $sThemeMatrice = null)
    {
        $this->s_theme_matrice = $sThemeMatrice;

        return $this;
    }

    /**
     * Get sThemeMatrice
     *
     * @return \PortfolioBundle\Entity\Sous_themes
     */
    public function getSThemeMatrice()
    {
        return $this->s_theme_matrice;
    }

    /**
     * Set sSThemeMatrice
     *
     * @param \PortfolioBundle\Entity\Sous_sous_themes $sSThemeMatrice
     *
     * @return Matrice
     */
    public function setSSThemeMatrice(\PortfolioBundle\Entity\Sous_sous_themes $sSThemeMatrice = null)
    {
        $this->s_s_theme_matrice = $sSThemeMatrice;

        return $this;
    }

    /**
     * Get sSThemeMatrice
     *
     * @return \PortfolioBundle\Entity\Sous_sous_themes
     */
    public function getSSThemeMatrice()
    {
        return $this->s_s_theme_matrice;
    }

    public function __toString()
    {
        return $this->theme_matrice.''.$this->s_theme_matrice.''.$this->s_s_theme_matrice;
    }
}
