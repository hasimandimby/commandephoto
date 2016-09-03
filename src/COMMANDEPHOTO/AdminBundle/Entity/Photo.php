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
     * @ORM\Column(name="portrait", type="string", length=255)
     */
    private $portrait;

    /**
     * @var string
     *
     * @ORM\Column(name="classic", type="string", length=255)
     */
    private $classic;

    /**
     * @var string
     *
     * @ORM\Column(name="fun", type="string", length=255)
     */
    private $fun;


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
     * @param string $portrait
     *
     * @return Photo
     */
    public function setPortrait($portrait)
    {
        $this->portrait = $portrait;

        return $this;
    }

    /**
     * Get numeroportrait
     *
     * @return string
     */
    public function getPortrait()
    {
        return $this->portrait;
    }

    /**
     * Set nomphoto
     *
     * @param string $classic
     *
     * @return Photo
     */
    public function setClassic($classic)
    {
        $this->classic = $classic;

        return $this;
    }

    /**
     * Get nomphoto
     *
     * @return string
     */
    public function getClassic()
    {
        return $this->classic;
    }

    /**
     * Set numerophoto
     *
     * @param string $fun
     *
     * @return Photo
     */
    public function setFun($fun)
    {
        $this->fun = $fun;

        return $this;
    }

    /**
     * Get numerophoto
     *
     * @return string
     */
    public function getFun()
    {
        return $this->fun;
    }
}

