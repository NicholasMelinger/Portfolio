<?php

namespace PortfolioBundle\Entity;

/**
 * Utilisateurs_competences
 */
class Utilisateurs_competences
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $niveauCompetence;

    /**
     * @var string
     */
    private $detailCompetence;


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
     * Set niveauCompetence
     *
     * @param string $niveauCompetence
     *
     * @return Utilisateurs_competences
     */
    public function setNiveauCompetence($niveauCompetence)
    {
        $this->niveauCompetence = $niveauCompetence;

        return $this;
    }

    /**
     * Get niveauCompetence
     *
     * @return string
     */
    public function getNiveauCompetence()
    {
        return $this->niveauCompetence;
    }

    /**
     * Set detailCompetence
     *
     * @param string $detailCompetence
     *
     * @return Utilisateurs_competences
     */
    public function setDetailCompetence($detailCompetence)
    {
        $this->detailCompetence = $detailCompetence;

        return $this;
    }

    /**
     * Get detailCompetence
     *
     * @return string
     */
    public function getDetailCompetence()
    {
        return $this->detailCompetence;
    }
    /**
     * @var \PortfolioBundle\Entity\Utilisateurs
     */
    private $utilisateurs;

    /**
     * @var \PortfolioBundle\Entity\Competences
     */
    private $competences;

    /**
     * @var \PortfolioBundle\Entity\Validations
     */
    private $validations;


    /**
     * Set utilisateurs
     *
     * @param \PortfolioBundle\Entity\Utilisateurs $utilisateurs
     *
     * @return Utilisateurs_competences
     */
    public function setUtilisateurs(\PortfolioBundle\Entity\Utilisateurs $utilisateurs = null)
    {
        $this->utilisateurs = $utilisateurs;

        return $this;
    }

    /**
     * Get utilisateurs
     *
     * @return \PortfolioBundle\Entity\Utilisateurs
     */
    public function getUtilisateurs()
    {
        return $this->utilisateurs;
    }

    /**
     * Set competences
     *
     * @param \PortfolioBundle\Entity\Competences $competences
     *
     * @return Utilisateurs_competences
     */
    public function setCompetences(\PortfolioBundle\Entity\Competences $competences = null)
    {
        $this->competences = $competences;

        return $this;
    }

    /**
     * Get competences
     *
     * @return \PortfolioBundle\Entity\Competences
     */
    public function getCompetences()
    {
        return $this->competences;
    }

    /**
     * Set validations
     *
     * @param \PortfolioBundle\Entity\Validations $validations
     *
     * @return Utilisateurs_competences
     */
    public function setValidations(\PortfolioBundle\Entity\Validations $validations = null)
    {
        $this->validations = $validations;

        return $this;
    }

    /**
     * Get validations
     *
     * @return \PortfolioBundle\Entity\Validations
     */
    public function getValidations()
    {
        return $this->validations;
    }
}
