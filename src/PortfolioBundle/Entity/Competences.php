<?php

namespace PortfolioBundle\Entity;

/**
 * Competences
 */
class Competences
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $libelleCompetence;

    /**
     * @var \DateTime
     */
    private $dateCreation;

    /**
     * @var \DateTime
     */
    private $dateMaj;


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
     * Set libelleCompetence
     *
     * @param string $libelleCompetence
     *
     * @return Competences
     */
    public function setLibelleCompetence($libelleCompetence)
    {
        $this->libelleCompetence = $libelleCompetence;

        return $this;
    }

    /**
     * Get libelleCompetence
     *
     * @return string
     */
    public function getLibelleCompetence()
    {
        return $this->libelleCompetence;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Competences
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set dateMaj
     *
     * @param \DateTime $dateMaj
     *
     * @return Competences
     */
    public function setDateMaj($dateMaj)
    {
        $this->dateMaj = $dateMaj;

        return $this;
    }

    /**
     * Get dateMaj
     *
     * @return \DateTime
     */
    public function getDateMaj()
    {
        return $this->dateMaj;
    }
}

