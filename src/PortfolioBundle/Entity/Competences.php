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
    /**
     * @var \PortfolioBundle\Entity\Experiences
     */
    private $experiences_comp;

    /**
     * @var \PortfolioBundle\Entity\Cursus
     */
    private $cursus_comp;

    /**
     * @var \PortfolioBundle\Entity\Matrice
     */
    private $matrice_comp;


    /**
     * Set experiencesComp
     *
     * @param \PortfolioBundle\Entity\Experiences $experiencesComp
     *
     * @return Competences
     */
    public function setExperiencesComp(\PortfolioBundle\Entity\Experiences $experiencesComp = null)
    {
        $this->experiences_comp = $experiencesComp;

        return $this;
    }

    /**
     * Get experiencesComp
     *
     * @return \PortfolioBundle\Entity\Experiences
     */
    public function getExperiencesComp()
    {
        return $this->experiences_comp;
    }

    /**
     * Set cursusComp
     *
     * @param \PortfolioBundle\Entity\Cursus $cursusComp
     *
     * @return Competences
     */
    public function setCursusComp(\PortfolioBundle\Entity\Cursus $cursusComp = null)
    {
        $this->cursus_comp = $cursusComp;

        return $this;
    }

    /**
     * Get cursusComp
     *
     * @return \PortfolioBundle\Entity\Cursus
     */
    public function getCursusComp()
    {
        return $this->cursus_comp;
    }

    /**
     * Set matriceComp
     *
     * @param \PortfolioBundle\Entity\Matrice $matriceComp
     *
     * @return Competences
     */
    public function setMatriceComp(\PortfolioBundle\Entity\Matrice $matriceComp = null)
    {
        $this->matrice_comp = $matriceComp;

        return $this;
    }

    /**
     * Get matriceComp
     *
     * @return \PortfolioBundle\Entity\Matrice
     */
    public function getMatriceComp()
    {
        return $this->matrice_comp;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $user_competences;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user_competences = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add userCompetence
     *
     * @param \PortfolioBundle\Entity\Utilisateurs_competences $userCompetence
     *
     * @return Competences
     */
    public function addUserCompetence(\PortfolioBundle\Entity\Utilisateurs_competences $userCompetence)
    {
        $this->user_competences[] = $userCompetence;

        return $this;
    }

    /**
     * Remove userCompetence
     *
     * @param \PortfolioBundle\Entity\Utilisateurs_competences $userCompetence
     */
    public function removeUserCompetence(\PortfolioBundle\Entity\Utilisateurs_competences $userCompetence)
    {
        $this->user_competences->removeElement($userCompetence);
    }

    /**
     * Get userCompetences
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserCompetences()
    {
        return $this->user_competences;
    }
}
