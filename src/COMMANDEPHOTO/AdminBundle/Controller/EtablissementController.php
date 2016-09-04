<?php

namespace COMMANDEPHOTO\AdminBundle\Controller;

use COMMANDEPHOTO\AdminBundle\Entity\Etablissement;
use COMMANDEPHOTO\AdminBundle\Form\EtablType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EtablissementController extends Controller
{
    public function indexAction()
    {
        return $this->render('COMMANDEPHOTOAdminBundle:Default:index.html.twig');
    }
    public function addAction(Request $request)
    {
        $etablissement =new Etablissement();
        $form = $this->createForm(EtablType::class, $etablissement);
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($etablissement);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Etablissement bien enregistrée.');

            return $this->redirect($this->generateUrl('commandephoto_etablissement_liste'));
        }
        return $this->render('COMMANDEPHOTOAdminBundle:Etablissement:add.html.twig' ,array('form' => $form->createView()));
    }
    public function listeAction()
    {
        $etablissements = $this->getDoctrine()
            ->getManager()
            ->getRepository('COMMANDEPHOTOAdminBundle:Etablissement')
            ->findAll();


        return $this->render('COMMANDEPHOTOAdminBundle:Etablissement:liste.html.twig',array('etablissements' => $etablissements));
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
