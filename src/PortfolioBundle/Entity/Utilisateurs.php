<?php

namespace PortfolioBundle\Entity;

/**
 * Utilisateurs
 */
class Utilisateurs
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nomUtilisateur;

    /**
     * @var string
     */
    private $prenomUtilisateur;

    /**
     * @var string
     */
    private $mailUtilisateur;

    /**
     * @var string
     */
    private $loginUtilisateur;

    /**
     * @var string
     */
    private $mdpUtilisateur;

    /**
     * @var string
     */
    private $numeroMobile;

    /**
     * @var string
     */
    private $numeroFixe;

    /**
     * @var \DateTime
     */
    private $dateInscription;

    /**
     * @var \DateTime
     */
    private $dateMajProfil;

    /**
     * @var string
     */
    private $adressePostale;

    /**
     * @var string
     */
    private $ville;

    /**
     * @var string
     */
    private $codePostal;


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
     * Set nomUtilisateur
     *
     * @param string $nomUtilisateur
     *
     * @return Utilisateurs
     */
    public function setNomUtilisateur($nomUtilisateur)
    {
        $this->nomUtilisateur = $nomUtilisateur;

        return $this;
    }

    /**
     * Get nomUtilisateur
     *
     * @return string
     */
    public function getNomUtilisateur()
    {
        return $this->nomUtilisateur;
    }

    /**
     * Set prenomUtilisateur
     *
     * @param string $prenomUtilisateur
     *
     * @return Utilisateurs
     */
    public function setPrenomUtilisateur($prenomUtilisateur)
    {
        $this->prenomUtilisateur = $prenomUtilisateur;

        return $this;
    }

    /**
     * Get prenomUtilisateur
     *
     * @return string
     */
    public function getPrenomUtilisateur()
    {
        return $this->prenomUtilisateur;
    }

    /**
     * Set mailUtilisateur
     *
     * @param string $mailUtilisateur
     *
     * @return Utilisateurs
     */
    public function setMailUtilisateur($mailUtilisateur)
    {
        $this->mailUtilisateur = $mailUtilisateur;

        return $this;
    }

    /**
     * Get mailUtilisateur
     *
     * @return string
     */
    public function getMailUtilisateur()
    {
        return $this->mailUtilisateur;
    }

    /**
     * Set loginUtilisateur
     *
     * @param string $loginUtilisateur
     *
     * @return Utilisateurs
     */
    public function setLoginUtilisateur($loginUtilisateur)
    {
        $this->loginUtilisateur = $loginUtilisateur;

        return $this;
    }

    /**
     * Get loginUtilisateur
     *
     * @return string
     */
    public function getLoginUtilisateur()
    {
        return $this->loginUtilisateur;
    }

    /**
     * Set mdpUtilisateur
     *
     * @param string $mdpUtilisateur
     *
     * @return Utilisateurs
     */
    public function setMdpUtilisateur($mdpUtilisateur)
    {
        $this->mdpUtilisateur = $mdpUtilisateur;

        return $this;
    }

    /**
     * Get mdpUtilisateur
     *
     * @return string
     */
    public function getMdpUtilisateur()
    {
        return $this->mdpUtilisateur;
    }

    /**
     * Set numeroMobile
     *
     * @param string $numeroMobile
     *
     * @return Utilisateurs
     */
    public function setNumeroMobile($numeroMobile)
    {
        $this->numeroMobile = $numeroMobile;

        return $this;
    }

    /**
     * Get numeroMobile
     *
     * @return string
     */
    public function getNumeroMobile()
    {
        return $this->numeroMobile;
    }

    /**
     * Set numeroFixe
     *
     * @param string $numeroFixe
     *
     * @return Utilisateurs
     */
    public function setNumeroFixe($numeroFixe)
    {
        $this->numeroFixe = $numeroFixe;

        return $this;
    }

    /**
     * Get numeroFixe
     *
     * @return string
     */
    public function getNumeroFixe()
    {
        return $this->numeroFixe;
    }

    /**
     * Set dateInscription
     *
     * @param \DateTime $dateInscription
     *
     * @return Utilisateurs
     */
    public function setDateInscription($dateInscription)
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    /**
     * Get dateInscription
     *
     * @return \DateTime
     */
    public function getDateInscription()
    {
        return $this->dateInscription;
    }

    /**
     * Set dateMajProfil
     *
     * @param \DateTime $dateMajProfil
     *
     * @return Utilisateurs
     */
    public function setDateMajProfil($dateMajProfil)
    {
        $this->dateMajProfil = $dateMajProfil;

        return $this;
    }

    /**
     * Get dateMajProfil
     *
     * @return \DateTime
     */
    public function getDateMajProfil()
    {
        return $this->dateMajProfil;
    }

    /**
     * Set adressePostale
     *
     * @param string $adressePostale
     *
     * @return Utilisateurs
     */
    public function setAdressePostale($adressePostale)
    {
        $this->adressePostale = $adressePostale;

        return $this;
    }

    /**
     * Get adressePostale
     *
     * @return string
     */
    public function getAdressePostale()
    {
        return $this->adressePostale;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Utilisateurs
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set codePostal
     *
     * @param string $codePostal
     *
     * @return Utilisateurs
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return string
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }
}

