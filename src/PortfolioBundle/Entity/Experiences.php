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
}

