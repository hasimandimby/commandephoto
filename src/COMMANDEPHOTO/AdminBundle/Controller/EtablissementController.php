<?php

namespace COMMANDEPHOTO\AdminBundle\Controller;

use COMMANDEPHOTO\AdminBundle\Entity\Etablissement;
use COMMANDEPHOTO\AdminBundle\Form\EtablType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EtablissementController extends Controller
{
    public function indexAction()
    {
        return $this->render('COMMANDEPHOTOAdminBundle:Default:index.html.twig');
    }
    public function addAction()
    {
        $etablissement =new Etablissement();
        $form = $this->createForm(EtablType::class, $etablissement);
        return $this->render('COMMANDEPHOTOAdminBundle:Etablissement:add.html.twig' ,array('form' => $form->createView()));
    }
    public function listeAction()
    {
        return $this->render('COMMANDEPHOTOAdminBundle:Etablissement:liste.html.twig');
    }
    public function updateAction()
    {
        return $this->render('COMMANDEPHOTOAdminBundle:Etablissement:update.html.twig');
    }
    public function deleteAction()
    {
        return $this->redirect($this->generateUrl('mire_etablissement_liste'));
    }
}
