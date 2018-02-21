<?php

namespace PortfolioBundle\Entity;

/**
 * Matrice
 */
class Matrice
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $flagActif;


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
     * Set flagActif
     *
     * @param integer $flagActif
     *
     * @return Matrice
     */
    public function setFlagActif($flagActif)
    {
        $this->flagActif = $flagActif;

        return $this;
    }

    /**
     * Get flagActif
     *
     * @return int
     */
    public function getFlagActif()
    {
        return $this->flagActif;
    }
}

