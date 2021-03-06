<?php

namespace PortfolioBundle\Entity;

/**
 * Validations
 */
class Validations
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $dateValidation;

    /**
     * @var string
     */
    private $commentaire;

    /**
     * @var string
     */
    private $typeValid;

    /**
     * @var int
     */
    private $idUtilisateurValide;

    /**
     * @var int
     */
    private $idUtilisateurValidant;

    /**
     * @var int
     */
    private $idCompetenceValidee;
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
     * Set dateValidation
     *
     * @param \DateTime $dateValidation
     *
     * @return Validations
     */
    public function setDateValidation($dateValidation)
    {
        $this->dateValidation = $dateValidation;

        return $this;
    }

    /**
     * Get dateValidation
     *
     * @return \DateTime
     */
    public function getDateValidation()
    {
        return $this->dateValidation;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return Validations
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
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
     * @return Validations
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
     * Set idUtilisateurValide.
     *
     * @param int $idUtilisateurValide
     *
     * @return Validations
     */
    public function setIdUtilisateurValide($idUtilisateurValide)
    {
        $this->idUtilisateurValide = $idUtilisateurValide;

        return $this;
    }

    /**
     * Get idUtilisateurValide.
     *
     * @return int
     */
    public function getIdUtilisateurValide()
    {
        return $this->idUtilisateurValide;
    }

    /**
     * Set idUtilisateurValidant.
     *
     * @param int $idUtilisateurValidant
     *
     * @return Validations
     */
    public function setIdUtilisateurValidant($idUtilisateurValidant)
    {
        $this->idUtilisateurValidant = $idUtilisateurValidant;

        return $this;
    }

    /**
     * Get idUtilisateurValidant.
     *
     * @return int
     */
    public function getIdUtilisateurValidant()
    {
        return $this->idUtilisateurValidant;
    }

    /**
     * Set idCompetenceValidee.
     *
     * @param int $idCompetenceValidee
     *
     * @return Validations
     */
    public function setIdCompetenceValidee($idCompetenceValidee)
    {
        $this->idCompetenceValidee = $idCompetenceValidee;

        return $this;
    }

    /**
     * Get idCompetenceValidee.
     *
     * @return int
     */
    public function getIdCompetenceValidee()
    {
        return $this->idCompetenceValidee;
    }
}
