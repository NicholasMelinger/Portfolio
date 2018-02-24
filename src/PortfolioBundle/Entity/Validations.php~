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
}
