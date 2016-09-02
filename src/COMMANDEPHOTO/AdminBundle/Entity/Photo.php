<?php

namespace COMMANDEPHOTO\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Photo
 *
 * @ORM\Table(name="photo")
 * @ORM\Entity(repositoryClass="COMMANDEPHOTO\AdminBundle\Repository\PhotoRepository")
 */
class Photo
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
     * @ORM\Column(name="nomphoto", type="string", length=255)
     */
    private $nomphoto;

    /**
     * @var string
     *
     * @ORM\Column(name="numerophoto", type="string", length=255)
     */
    private $numerophoto;


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
     * Set uai
     *
     * @param string $uai
     *
     * @return Photo
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
     * @return Photo
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
     * Set nomphoto
     *
     * @param string $nomphoto
     *
     * @return Photo
     */
    public function setNomphoto($nomphoto)
    {
        $this->nomphoto = $nomphoto;

        return $this;
    }

    /**
     * Get nomphoto
     *
     * @return string
     */
    public function getNomphoto()
    {
        return $this->nomphoto;
    }

    /**
     * Set numerophoto
     *
     * @param string $numerophoto
     *
     * @return Photo
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
}

