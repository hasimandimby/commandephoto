<?php

namespace COMMANDEPHOTO\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Classe
 *
 * @ORM\Table(name="classe")
 * @ORM\Entity(repositoryClass="COMMANDEPHOTO\AdminBundle\Repository\ClasseRepository")
 */
class Classe
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
     * @ORM\Column(name="niveau", type="string", length=255)
     */
    private $niveau;

    /**
     * @var string
     *
     * @ORM\Column(name="fichier", type="string", length=255)
     */
    private $fichier;

    /**
     * @Assert\File( maxSize = "10000k", mimeTypesMessage = "Please upload a valid imagefile")
     */
    private $imagefile;


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
     * @return Classe
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
     * Set niveau
     *
     * @param string $niveau
     *
     * @return Classe
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get niveau
     *
     * @return string
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * Set fichier
     *
     * @param string $fichier
     *
     * @return Classe
     */
    public function setFichier($fichier)
    {
        $this->fichier = $fichier;

        return $this;
    }

    /**
     * Get fichier
     *
     * @return string
     */
    public function getFichier()
    {
        return $this->fichier;
    }



    /**
     * Set imagefile
     *
     * @param string $imagefile
     *
     * @return Article
     */
    public function setimagefile(UploadedFile $imagefile = null)
    {
        $this->imagefile = $imagefile;

        return $this;
    }

    /**
     * Get imagefile
     *
     * @return string
     */
    public function getimagefile()
    {
        return $this->imagefile;
    }

    private $tempFilename;
    /**
     * Called before saving the entity
     *
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->imagefile) {
            // do whatever you want to generate a unique name
            $filename = sha1(uniqid(mt_rand(), true));
            $this->imagefile = $filename.'.'.$this->imagefile->guessExtension();
        }
    }

    public function upload()
    {
        // The file property can be empty if the field is not required
        if (null === $this->imagefile) {
            return;
        }

        // Use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and then the
        // target filename to move to
        $this->imagefile->move(
            $this->getUploadRootDir(),
            $this->imagefile->getClientOriginalName()
        );
        $this->fichier = $this->imagefile->getClientOriginalName();
        // Set the path property to the filename where you've saved the file
        //$this->path = $this->file->getClientOriginalName();

        // Clean up the file property as you won't need it anymore
        $this->imagefile = null;
        return $this->getUploadRootDir()."/".$this->fichier;
    }

    /**
     * @ORM\PreRemove()
     */
    public function preRemoveUpload()
    {
        // On sauvegarde temporairement le nom du fichier, car il dépend de l'id
        $this->tempFilename = $this->getUploadRootDir().'/'.$this->id.'.'.$this->imagefile;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        // En PostRemove, on n'a pas accès à l'id, on utilise notre nom sauvegardé
        if (file_exists($this->tempFilename)) {
            // On supprime le fichier
            unlink($this->tempFilename);
        }
    }

    public function getUploadDir()
    {
        // On retourne le chemin relatif vers l'imagefile pour un navigateur
        return 'uploads/zip';
    }

    protected function getUploadRootDir()
    {
        // On retourne le chemin relatif vers l'imagefile pour notre code PHP
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

}

