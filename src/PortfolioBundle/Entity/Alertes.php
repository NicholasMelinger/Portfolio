<?php

namespace PortfolioBundle\Entity;

/**
 * Alertes
 */
class Alertes
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $dateCreationAlerte;

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
     * Set dateCreationAlerte
     *
     * @param \DateTime $dateCreationAlerte
     *
     * @return Alertes
     */
    public function setDateCreationAlerte($dateCreationAlerte)
    {
        $this->dateCreationAlerte = $dateCreationAlerte;

        return $this;
    }

    /**
     * Get dateCreationAlerte
     *
     * @return \DateTime
     */
    public function getDateCreationAlerte()
    {
        return $this->dateCreationAlerte;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return Alertes
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
     * @var \PortfolioBundle\Entity\Competences
     */
    private $competence;


    /**
     * Set competence.
     *
     * @param \PortfolioBundle\Entity\Competences|null $competence
     *
     * @return Alertes
     */
    public function setCompetence(\PortfolioBundle\Entity\Competences $competence = null)
    {
        $this->competence = $competence;

        return $this;
    }

    /**
     * Get competence.
     *
     * @return \PortfolioBundle\Entity\Competences|null
     */
    public function getCompetence()
    {
        return $this->competence;
    }
    /**
     * @var \PortfolioBundle\Entity\Utilisateurs
     */
    private $utilisateur;


    /**
     * Set utilisateur.
     *
     * @param \PortfolioBundle\Entity\Utilisateurs|null $utilisateur
     *
     * @return Alertes
     */
    public function setUtilisateur(\PortfolioBundle\Entity\Utilisateurs $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur.
     *
     * @return \PortfolioBundle\Entity\Utilisateurs|null
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }
    /**
     * @var int
     */
    private $flag_actif;


    /**
     * Set flagActif.
     *
     * @param int $flagActif
     *
     * @return Alertes
     */
    public function setFlagActif($flagActif)
    {
        $this->flag_actif = $flagActif;

        return $this;
    }

    /**
     * Get flagActif.
     *
     * @return int
     */
    public function getFlagActif()
    {
        return $this->flag_actif;
    }
}
