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
}

