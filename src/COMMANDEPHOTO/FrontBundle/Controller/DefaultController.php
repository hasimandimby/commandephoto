<?php

namespace COMMANDEPHOTO\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('COMMANDEPHOTOFrontBundle:Default:index.html.twig');
    }
    public function commandeAction(Request $request)
    {
        $uai = $request->get('uai');
        $numero = $request->get('numero');
        $em = $this->getDoctrine()->getManager();
        $etablissement = $em->getRepository('COMMANDEPHOTOAdminBundle:Etablissement')->findBy(array("uai"=>$uai));
        $photo = $em->getRepository('COMMANDEPHOTOAdminBundle:Photo')->findPhoto($uai,$numero);
        return $this->render('COMMANDEPHOTOFrontBundle:Default:commande.html.twig',array('etablissement' =>$etablissement,'photo' => $photo));

    }
}
