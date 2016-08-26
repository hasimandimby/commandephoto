<?php

namespace COMMANDEPHOTO\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('COMMANDEPHOTOFrontBundle:Default:index.html.twig');
    }
}
