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
}

