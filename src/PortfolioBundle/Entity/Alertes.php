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
}
