<?php

namespace COMMANDEPHOTO\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Panier
 *
 * @ORM\Table(name="panier")
 * @ORM\Entity(repositoryClass="COMMANDEPHOTO\AdminBundle\Repository\PanierRepository")
 */
class Panier
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
     * @var int
     *
     * @ORM\Column(name="idachat", type="integer")
     */
    private $idachat;

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
     * @var string
     *
     * @ORM\Column(name="numerophoto", type="string", length=255)
     */
    private $numerophoto;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer")
     */
    private $quantite;


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
     * Set idachat
     *
     * @param integer $idachat
     *
     * @return Panier
     */
    public function setIdachat($idachat)
    {
        $this->idachat = $idachat;

        return $this;
    }

    /**
     * Get idachat
     *
     * @return int
     */
    public function getIdachat()
    {
        return $this->idachat;
    }

    /**
     * Set uai
     *
     * @param string $uai
     *
     * @return Panier
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
     * @return Panier
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
     * Set numerophoto
     *
     * @param string $numerophoto
     *
     * @return Panier
     */
    public function setNumerophoto($numerophoto)
    {
        $this->numerophoto = $numerophoto;

        return $this;
    }

    /**
     * Get numerophoto
     *
     * @return string
     */
    public function getNumerophoto()
    {
        return $this->numerophoto;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return Panier
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return int
     */
    public function getQuantite()
    {
        return $this->quantite;
    }
}

