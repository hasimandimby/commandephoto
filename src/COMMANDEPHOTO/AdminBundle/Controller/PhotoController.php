<?php

namespace COMMANDEPHOTO\AdminBundle\Controller;

use COMMANDEPHOTO\AdminBundle\Entity\Classe;
use COMMANDEPHOTO\AdminBundle\Entity\Photo;
use COMMANDEPHOTO\AdminBundle\Form\ClasseType;
use COMMANDEPHOTO\AdminBundle\Form\EtablType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PhotoController extends Controller
{
    public function indexAction()
    {
        return $this->render('COMMANDEPHOTOAdminBundle:Photo:index.html.twig');
    }
    public function addAction(Request $request)
    {
        $classe =new Classe();
        $form = $this->createForm(ClasseType::class, $classe);
        if ($form->handleRequest($request)->isValid()) {
            $chemin = $classe->upload();
            $em = $this->getDoctrine()->getManager();
            $em->persist($classe);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'photo bien enregistrée.');
            $rep_ecole = __DIR__.'/../../../../web/uploads/photo/'.$classe->getUai().'/';
            if (!is_dir($rep_ecole))
                mkdir($rep_ecole, 0777);
            $targetdir =  $rep_ecole.$classe->getNiveau();
            if (is_dir($targetdir))  $this->rmdir_recursive ( $targetdir);
            mkdir($targetdir, 0777);
                  $zip = new \ZipArchive();
                  $x = $zip->open($chemin);
                  if ($x === true) {
                            $zip->extractTo($targetdir);
                            $zip->close();
                            unlink($chemin);
                  }
            $this->savecontenu($targetdir,$targetdir);
            $directory = opendir($targetdir) or die("Erreur le repertoire $targetdir existe pas");
            $photofun = "";
            $photoclassic = "";
            $nbphoto = 0;
            while($fichier = @readdir($directory))
            {
                if ($fichier == "." || $fichier == "..") continue;
                if($nbphoto == 0 )
                {
                    $photoclassic = $fichier;
                    $nbphoto++;
                    continue;
                }
                if($nbphoto == 1 )
                {
                    $photofun = $fichier;
                    $nbphoto++;
                    continue;
                }
                $photo = new Photo();
                $photo->setUai($classe->getUai());
                $photo->setClassic($photoclassic);
                $photo->setFun($photofun);
                $photo->setClasse($classe->getNiveau());
                $portrait = basename($fichier, ".jpg");
                $photo->setPortrait($portrait);
                $em->persist($photo);
                $em->flush();
                $nbphoto++;
            }
            closedir($directory);

           // return $this->redirect($this->generateUrl('commandephoto_photo_liste'));
        }
        return $this->render('COMMANDEPHOTOAdminBundle:Photo:add.html.twig' ,array('form' => $form->createView()));
    }
    public function listeAction()
    {
        $photos = $this->getDoctrine()
            ->getManager()
            ->getRepository('COMMANDEPHOTOAdminBundle:Photo')
            ->findAll();
        return $this->render('COMMANDEPHOTOAdminBundle:Photo:liste.html.twig',array('photos' => $photos));
    }
    public function listeclasseAction()
    {
        $classes = $this->getDoctrine()
            ->getManager()
            ->getRepository('COMMANDEPHOTOAdminBundle:Classe')
            ->findAll();
        return $this->render('COMMANDEPHOTOAdminBundle:Classe:liste.html.twig',array('classes' => $classes));
    }

    public function deleteAction()
    {
        return $this->redirect($this->generateUrl('commandephoto_photo_liste'));
    }
    function rmdir_recursive($dir) {
        foreach(scandir($dir) as $file) {
            if ('.' === $file || '..' === $file) continue;
            if (is_dir("$dir/$file")) $this->rmdir_recursive("$dir/$file");
            else unlink("$dir/$file");
        }

        rmdir($dir);
    }

    function savecontenu($dir,$dirorig)
    {
        if(is_dir($dir))
        {
            $le_repertoire = opendir($dir) or die("Erreur le repertoire $dir existe pas");
            while($fichier = @readdir($le_repertoire))
            {

                // enlever les traitements inutile
                if ($fichier == "." || $fichier == "..") continue;


                if(is_dir($dir.'/'.$fichier))
                {
                    $this->copy_dir($dir.'/'.$fichier.'/',$dirorig);
                    $this->savecontenu($dir.'/'.$fichier,$dirorig);
                }
                else
                {
                    $photo = new Photo();
                }

            }

            closedir($le_repertoire);
        }

    }
    function copy_dir($dir2copy,$dir_paste)
    {
        if (is_dir($dir2copy))
        {
            if ($dh = opendir($dir2copy))
            {
                while(($file = readdir($dh)) !== false)
                {
                    if (!is_dir($dir_paste)) mkdir($dir_paste,777);
                    if(is_dir($dir2copy.$file) && $file != '..'  && $file != '.')
                        copy_dir ( $dir2copy.$file.'/' , $dir_paste.'/'.$file);
                    elseif($file != '..'  && $file != '.') copy ( $dir2copy.$file , $dir_paste.'/'.$file );

                }
                closedir($dh);
            }
            $this->del_dir($dir2copy);
        }
    }
    function del_dir($dir) {
        $files = glob( $dir . '*', GLOB_MARK );
        foreach( $files as $file ){
            if( substr( $file, -1 ) == '/' )
                del_dir( $file );
            else
                unlink( $file );
        }
        rmdir( $dir );
    }

}
