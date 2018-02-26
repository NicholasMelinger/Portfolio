<?php

namespace PortfolioBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Utilisateurs
 */
class Utilisateurs implements UserInterface
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
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $plainPassword;

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
     * @var integer
     */
    private $dateNaissance;

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
     * Set username
     *
     * @param string $username
     *
     * @return Utilisateurs
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Utilisateurs
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get mdpUtilisateur
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set plainPassword
     *
     * @param string $plainPassword
     *
     * @return Utilisateurs
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    /**
     * Get mdpUtilisateur
     *
     * @return string
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
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

    /**
     * Set dateNaissance
     *
     * @param string $dateNaissance
     *
     * @return Utilisateurs
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return string
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }


    /**
     * @var \PortfolioBundle\Entity\Types_utilisateur
     */
    private $type_utilisateur;

    /**
     * Set typeUtilisateur
     *
     * @param \PortfolioBundle\Entity\Types_utilisateur $typeUtilisateur
     *
     * @return Utilisateurs
     */
    public function setTypeUtilisateur(\PortfolioBundle\Entity\Types_utilisateur $typeUtilisateur = null)
    {
        $this->type_utilisateur = $typeUtilisateur;

        return $this;
    }

    /**
     * Get typeUtilisateur
     *
     * @return \PortfolioBundle\Entity\Types_utilisateur
     */
    public function getTypeUtilisateur()
    {
        return $this->type_utilisateur;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $experiences;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->experiences = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add experience
     *
     * @param \PortfolioBundle\Entity\Experiences $experience
     *
     * @return Utilisateurs
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $user_competences;


    /**
     * Add userCompetence
     *
     * @param \PortfolioBundle\Entity\Utilisateurs_competences $userCompetence
     *
     * @return Utilisateurs
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
     * @var \PortfolioBundle\Entity\Cursus_utilisateurs_competences
     */
    private $cursus_utilisateurs_competences;


    /**
     * Set cursusUtilisateursCompetences
     *
     * @param \PortfolioBundle\Entity\Cursus_utilisateurs_competences $cursusUtilisateursCompetences
     *
     * @return Utilisateurs
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $utilisateurs;


    /**
     * Add utilisateur
     *
     * @param \PortfolioBundle\Entity\Utilisateurs_competences $utilisateur
     *
     * @return Utilisateurs
     */
    public function addUtilisateur(\PortfolioBundle\Entity\Utilisateurs_competences $utilisateur)
    {
        $this->utilisateurs[] = $utilisateur;

        return $this;
    }

    /**
     * Remove utilisateur
     *
     * @param \PortfolioBundle\Entity\Utilisateurs_competences $utilisateur
     */
    public function removeUtilisateur(\PortfolioBundle\Entity\Utilisateurs_competences $utilisateur)
    {
        $this->utilisateurs->removeElement($utilisateur);
    }

    /**
     * Get utilisateurs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUtilisateurs()
    {
        return $this->utilisateurs;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Cursus_utilisateurs_competences;


    /**
     * Add cursusUtilisateursCompetence
     *
     * @param \PortfolioBundle\Entity\Utilisateurs_competences $cursusUtilisateursCompetence
     *
     * @return Utilisateurs
     */
    public function addCursusUtilisateursCompetence(\PortfolioBundle\Entity\Utilisateurs_competences $cursusUtilisateursCompetence)
    {
        $this->Cursus_utilisateurs_competences[] = $cursusUtilisateursCompetence;

        return $this;
    }

    /**
     * Remove cursusUtilisateursCompetence
     *
     * @param \PortfolioBundle\Entity\Utilisateurs_competences $cursusUtilisateursCompetence
     */
    public function removeCursusUtilisateursCompetence(\PortfolioBundle\Entity\Utilisateurs_competences $cursusUtilisateursCompetence)
    {
        $this->Cursus_utilisateurs_competences->removeElement($cursusUtilisateursCompetence);
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
     * @return Utilisateurs
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
    /**
     * @var \PortfolioBundle\Entity\Types_utilisateur
     */
    private $types_utilisateur;


    /**
     * Set typesUtilisateur
     *
     * @param \PortfolioBundle\Entity\Types_utilisateur $typesUtilisateur
     *
     * @return Utilisateurs
     */
    public function setTypesUtilisateur(\PortfolioBundle\Entity\Types_utilisateur $typesUtilisateur = null)
    {
        $this->types_utilisateur = $typesUtilisateur;

        return $this;
    }

    /**
     * Get typesUtilisateur
     *
     * @return \PortfolioBundle\Entity\Types_utilisateur
     */
    public function getTypesUtilisateur()
    {
        return $this->types_utilisateur;

    }
    public function getSalt()
    {
        // The bcrypt and argon2i algorithms don't require a separate salt.
        // You *may* need a real salt if you choose a different encoder.
        return null;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function eraseCredentials()
    {

    }
}
