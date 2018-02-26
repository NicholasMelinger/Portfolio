<?php

namespace PortfolioBundle\Entity;

/**
 * Experiences
 */
class Experiences
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $typeExperience;

    /**
     * @var int
     */
    private $anneeDebutExperience;

    /**
     * @var int
     */
    private $anneeFinExperience;

    /**
     * @var string
     */
    private $descriptionExperience;


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
     * Set typeExperience
     *
     * @param string $typeExperience
     *
     * @return Experiences
     */
    public function setTypeExperience($typeExperience)
    {
        $this->typeExperience = $typeExperience;

        return $this;
    }

    /**
     * Get typeExperience
     *
     * @return string
     */
    public function getTypeExperience()
    {
        return $this->typeExperience;
    }

    /**
     * Set dateDebutExperience
     *
     * @param integer $dateDebutExperience
     *
     * @return Experiences
     */
    public function setDateDebutExperience($dateDebutExperience)
    {
        $this->dateDebutExperience = $dateDebutExperience;

        return $this;
    }

    /**
     * Get dateDebutExperience
     *
     * @return int
     */
    public function getDateDebutExperience()
    {
        return $this->dateDebutExperience;
    }

    /**
     * Set anneeFinExperience
     *
     * @param integer $anneeFinExperience
     *
     * @return Experiences
     */
    public function setAnneeFinExperience($anneeFinExperience)
    {
        $this->anneeFinExperience = $anneeFinExperience;

        return $this;
    }

    /**
     * Get anneeFinExperience
     *
     * @return int
     */
    public function getAnneeFinExperience()
    {
        return $this->anneeFinExperience;
    }

    /**
     * Set descriptionExperience
     *
     * @param string $descriptionExperience
     *
     * @return Experiences
     */
    public function setDescriptionExperience($descriptionExperience)
    {
        $this->descriptionExperience = $descriptionExperience;

        return $this;
    }

    /**
     * Get descriptionExperience
     *
     * @return string
     */
    public function getDescriptionExperience()
    {
        return $this->descriptionExperience;
    }

    /**
     * Set anneeDebutExperience
     *
     * @param integer $anneeDebutExperience
     *
     * @return Experiences
     */
    public function setAnneeDebutExperience($anneeDebutExperience)
    {
        $this->anneeDebutExperience = $anneeDebutExperience;

        return $this;
    }

    /**
     * Get anneeDebutExperience
     *
     * @return integer
     */
    public function getAnneeDebutExperience()
    {
        return $this->anneeDebutExperience;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $competences;

    /**
     * @var \PortfolioBundle\Entity\Utilisateurs
     */
    private $utilisateurs_exp;

    /**
     * @var \PortfolioBundle\Entity\Cursus
     */
    private $cursus_exp;

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
     * @return Experiences
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
     * Set utilisateursExp
     *
     * @param \PortfolioBundle\Entity\Utilisateurs $utilisateursExp
     *
     * @return Experiences
     */
    public function setUtilisateursExp(\PortfolioBundle\Entity\Utilisateurs $utilisateursExp = null)
    {
        $this->utilisateurs_exp = $utilisateursExp;

        return $this;
    }

    /**
     * Get utilisateursExp
     *
     * @return \PortfolioBundle\Entity\Utilisateurs
     */
    public function getUtilisateursExp()
    {
        return $this->utilisateurs_exp;
    }

    /**
     * Set cursusExp
     *
     * @param \PortfolioBundle\Entity\Cursus $cursusExp
     *
     * @return Experiences
     */
    public function setCursusExp(\PortfolioBundle\Entity\Cursus $cursusExp = null)
    {
        $this->cursus_exp = $cursusExp;

        return $this;
    }

    /**
     * Get cursusExp
     *
     * @return \PortfolioBundle\Entity\Cursus
     */
    public function getCursusExp()
    {
        return $this->cursus_exp;
    }
    /**
     * @var string
     */
    private $dureeExperience;


    /**
     * Set dureeExperience
     *
     * @param string $dureeExperience
     *
     * @return Experiences
     */
    public function setDureeExperience($dureeExperience)
    {
        $this->dureeExperience = $dureeExperience;

        return $this;
    }

    /**
     * Get dureeExperience
     *
     * @return string
     */
    public function getDureeExperience()
    {
        return $this->dureeExperience;
    }
    /**
     * @var \PortfolioBundle\Entity\Utilisateurs
     */
    private $utilisateurs;

    /**
     * @var \PortfolioBundle\Entity\Cursus
     */
    private $cursus;


    /**
     * Set utilisateurs
     *
     * @param \PortfolioBundle\Entity\Utilisateurs $utilisateurs
     *
     * @return Experiences
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
     * Set cursus
     *
     * @param \PortfolioBundle\Entity\Cursus $cursus
     *
     * @return Experiences
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
}
