<?php

namespace PortfolioBundle\Entity;

/**
 * Cursus
 */
class Cursus
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $libelleFormation;

    /**
     * @var int
     */
    private $anneeFormation;

    /**
     * @var string
     */
    private $descriptionFormation;


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
     * Set libelleFormation
     *
     * @param string $libelleFormation
     *
     * @return Cursus
     */
    public function setLibelleFormation($libelleFormation)
    {
        $this->libelleFormation = $libelleFormation;

        return $this;
    }

    /**
     * Get libelleFormation
     *
     * @return string
     */
    public function getLibelleFormation()
    {
        return $this->libelleFormation;
    }

    /**
     * Set anneeFormation
     *
     * @param integer $anneeFormation
     *
     * @return Cursus
     */
    public function setAnneeFormation($anneeFormation)
    {
        $this->anneeFormation = $anneeFormation;

        return $this;
    }

    /**
     * Get anneeFormation
     *
     * @return int
     */
    public function getAnneeFormation()
    {
        return $this->anneeFormation;
    }

    /**
     * Set descriptionFormation
     *
     * @param string $descriptionFormation
     *
     * @return Cursus
     */
    public function setDescriptionFormation($descriptionFormation)
    {
        $this->descriptionFormation = $descriptionFormation;

        return $this;
    }

    /**
     * Get descriptionFormation
     *
     * @return string
     */
    public function getDescriptionFormation()
    {
        return $this->descriptionFormation;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $experiences;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $competences;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->experiences = new \Doctrine\Common\Collections\ArrayCollection();
        $this->competences = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add experience
     *
     * @param \PortfolioBundle\Entity\Experiences $experience
     *
     * @return Cursus
     */
    public function addExperience(\PortfolioBundle\Entity\Experiences $experience)
    {
        $this->experiences[] = $experience;

        return $this;
    }

    /**
     * Remove experience
     *
     * @param \PortfolioBundle\Entity\Experiences $experience
     */
    public function removeExperience(\PortfolioBundle\Entity\Experiences $experience)
    {
        $this->experiences->removeElement($experience);
    }

    /**
     * Get experiences
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getExperiences()
    {
        return $this->experiences;
    }

    /**
     * Add competence
     *
     * @param \PortfolioBundle\Entity\Competences $competence
     *
     * @return Cursus
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

    public function __toString() {

        return $this->libelleFormation;
    }
    /**
     * @var \PortfolioBundle\Entity\Cursus_utilisateurs_competences
     */
    private $cursus_utilisateurs_competences;


    /**
     * Set cursusUtilisateursCompetences
     *
     * @param \PortfolioBundle\Entity\Cursus_utilisateurs_competences $cursusUtilisateursCompetences
     *
     * @return Cursus
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
     * Add cursusUtilisateursCompetence
     *
     * @param \PortfolioBundle\Entity\Cursus_utilisateurs_competences $cursusUtilisateursCompetence
     *
     * @return Cursus
     */
    public function addCursusUtilisateursCompetence(\PortfolioBundle\Entity\Cursus_utilisateurs_competences $cursusUtilisateursCompetence)
    {
        $this->cursus_utilisateurs_competences[] = $cursusUtilisateursCompetence;

        return $this;
    }

    /**
     * Remove cursusUtilisateursCompetence
     *
     * @param \PortfolioBundle\Entity\Cursus_utilisateurs_competences $cursusUtilisateursCompetence
     */
    public function removeCursusUtilisateursCompetence(\PortfolioBundle\Entity\Cursus_utilisateurs_competences $cursusUtilisateursCompetence)
    {
        $this->cursus_utilisateurs_competences->removeElement($cursusUtilisateursCompetence);
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
     * @return Cursus
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
}
