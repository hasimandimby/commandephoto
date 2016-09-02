<?php

namespace COMMANDEPHOTO\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Achat
 *
 * @ORM\Table(name="achat")
 * @ORM\Entity(repositoryClass="COMMANDEPHOTO\AdminBundle\Repository\AchatRepository")
 */
class Achat
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="classe", type="string", length=255)
     */
    private $classe;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=50)
     */
    private $mail;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateachat", type="date")
     */
    private $dateachat;

    /**
     * @var string
     *
     * @ORM\Column(name="uai", type="string", length=255)
     */
    private $uai;

    /**
     * @var string
     *
     * @ORM\Column(name="numeroportrait", type="string", length=255)
     */
    private $numeroportrait;

    /**
     * @var int
     *
     * @ORM\Column(name="valide", type="integer")
     */
    private $valide;


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
     * Set classe
     *
     * @param string $classe
     *
     * @return Achat
     */
    public function setClasse($classe)
    {
        $this->classe = $classe;

        return $this;
    }

    /**
     * Get classe
     *
     * @return string
     */
    public function getClasse()
    {
        return $this->classe;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Achat
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Achat
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set dateachat
     *
     * @param \DateTime $dateachat
     *
     * @return Achat
     */
    public function setDateachat($dateachat)
    {
        $this->dateachat = $dateachat;

        return $this;
    }

    /**
     * Get dateachat
     *
     * @return \DateTime
     */
    public function getDateachat()
    {
        return $this->dateachat;
    }

    /**
     * Set uai
     *
     * @param string $uai
     *
     * @return Achat
     */
    public function setUai($uai)
    {
        $this->uai = $uai;

        return $this;
    }

    /**
     * Get uai
     *
     * @return string
     */
    public function getUai()
    {
        return $this->uai;
    }

    /**
     * Set numeroportrait
     *
     * @param string $numeroportrait
     *
     * @return Achat
     */
    public function setNumeroportrait($numeroportrait)
    {
        $this->numeroportrait = $numeroportrait;

        return $this;
    }

    /**
     * Get numeroportrait
     *
     * @return string
     */
    public function getNumeroportrait()
    {
        return $this->numeroportrait;
    }

    /**
     * Set valide
     *
     * @param integer $valide
     *
     * @return Achat
     */
    public function setValide($valide)
    {
        $this->valide = $valide;

        return $this;
    }

    /**
     * Get valide
     *
     * @return int
     */
    public function getValide()
    {
        return $this->valide;
    }
}

