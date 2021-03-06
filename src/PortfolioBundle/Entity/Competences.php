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
    /**
     * @var \PortfolioBundle\Entity\Cursus
     */
    private $cursus;


    /**
     * Set cursus
     *
     * @param \PortfolioBundle\Entity\Cursus $cursus
     *
     * @return Competences
     */
    public function setCursus(\PortfolioBundle\Entity\Cursus $cursus = null)
    {
        $this->cursus = $cursus;

        return $this;
    }

    /**
     * Get cursus
     *
     * @return \PortfolioBundle\Entity\Cursus
     */
    public function getCursus()
    {
        return $this->cursus;
    }
    /**
     * @var \PortfolioBundle\Entity\Experiences
     */
    private $experiences;

    /**
     * @var \PortfolioBundle\Entity\Matrice
     */
    private $matrice;

    /**
     * @var \PortfolioBundle\Entity\Cursus_utilisateurs_competences
     */
    private $cursus_utilisateurs_competences;


    /**
     * Set experiences
     *
     * @param \PortfolioBundle\Entity\Experiences $experiences
     *
     * @return Competences
     */
    public function setExperiences(\PortfolioBundle\Entity\Experiences $experiences = null)
    {
        $this->experiences = $experiences;

        return $this;
    }

    /**
     * Get experiences
     *
     * @return \PortfolioBundle\Entity\Experiences
     */
    public function getExperiences()
    {
        return $this->experiences;
    }

    /**
     * Set matrice
     *
     * @param \PortfolioBundle\Entity\Matrice $matrice
     *
     * @return Competences
     */
    public function setMatrice(\PortfolioBundle\Entity\Matrice $matrice = null)
    {
        $this->matrice = $matrice;

        return $this;
    }

    /**
     * Get matrice
     *
     * @return \PortfolioBundle\Entity\Matrice
     */
    public function getMatrice()
    {
        return $this->matrice;
    }

    /**
     * Set cursusUtilisateursCompetences
     *
     * @param \PortfolioBundle\Entity\Cursus_utilisateurs_competences $cursusUtilisateursCompetences
     *
     * @return Competences
     */
    public function setCursusUtilisateursCompetences(\PortfolioBundle\Entity\Cursus_utilisateurs_competences $cursusUtilisateursCompetences = null)
    {
        $this->cursus_utilisateurs_competences = $cursusUtilisateursCompetences;

        return $this;
    }

    /**
     * Get cursusUtilisateursCompetences
     *
     * @return \PortfolioBundle\Entity\Cursus_utilisateurs_competences
     */
    public function getCursusUtilisateursCompetences()
    {
        return $this->cursus_utilisateurs_competences;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Cursus_utilisateurs_competences;


    /**
     * Add cursusUtilisateursCompetence
     *
     * @param \PortfolioBundle\Entity\Cursus_utilisateurs_competences $cursusUtilisateursCompetence
     *
     * @return Competences
     */
    public function addCursusUtilisateursCompetence(\PortfolioBundle\Entity\Cursus_utilisateurs_competences $cursusUtilisateursCompetence)
    {
        $this->Cursus_utilisateurs_competences[] = $cursusUtilisateursCompetence;

        return $this;
    }

    /**
     * Remove cursusUtilisateursCompetence
     *
     * @param \PortfolioBundle\Entity\Cursus_utilisateurs_competences $cursusUtilisateursCompetence
     */
    public function removeCursusUtilisateursCompetence(\PortfolioBundle\Entity\Cursus_utilisateurs_competences $cursusUtilisateursCompetence)
    {
        $this->Cursus_utilisateurs_competences->removeElement($cursusUtilisateursCompetence);
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $cup;


    /**
     * Add cup
     *
     * @param \PortfolioBundle\Entity\Cursus_utilisateurs_competences $cup
     *
     * @return Competences
     */
    public function addCup(\PortfolioBundle\Entity\Cursus_utilisateurs_competences $cup)
    {
        $this->cup[] = $cup;

        return $this;
    }

    /**
     * Remove cup
     *
     * @param \PortfolioBundle\Entity\Cursus_utilisateurs_competences $cup
     */
    public function removeCup(\PortfolioBundle\Entity\Cursus_utilisateurs_competences $cup)
    {
        $this->cup->removeElement($cup);
    }

    /**
     * Get cup
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCup()
    {
        return $this->cup;
    }

    public function __toString()
    {
        return $this->libelleCompetence;
    }
    /**
     * @var \PortfolioBundle\Entity\Alertes
     */
    private $alertes;


    /**
     * Set alertes.
     *
     * @param \PortfolioBundle\Entity\Alertes|null $alertes
     *
     * @return Competences
     */
    public function setAlertes(\PortfolioBundle\Entity\Alertes $alertes = null)
    {
        $this->alertes = $alertes;

        return $this;
    }

    /**
     * Get alertes.
     *
     * @return \PortfolioBundle\Entity\Alertes|null
     */
    public function getAlertes()
    {
        return $this->alertes;
    }

    /**
     * Add alerte.
     *
     * @param \PortfolioBundle\Entity\Alertes $alerte
     *
     * @return Competences
     */
    public function addAlerte(\PortfolioBundle\Entity\Alertes $alerte)
    {
        $this->alertes[] = $alerte;

        return $this;
    }

    /**
     * Remove alerte.
     *
     * @param \PortfolioBundle\Entity\Alertes $alerte
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeAlerte(\PortfolioBundle\Entity\Alertes $alerte)
    {
        return $this->alertes->removeElement($alerte);
    }
}
