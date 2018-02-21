<?php

namespace PortfolioBundle\Entity;

/**
 * Cursus_utilisateurs_competences
 */
class Cursus_utilisateurs_competences
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $diplome;


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
     * Set diplome
     *
     * @param integer $diplome
     *
     * @return Cursus_utilisateurs_competences
     */
    public function setDiplome($diplome)
    {
        $this->diplome = $diplome;

        return $this;
    }

    /**
     * Get diplome
     *
     * @return int
     */
    public function getDiplome()
    {
        return $this->diplome;
    }
}

