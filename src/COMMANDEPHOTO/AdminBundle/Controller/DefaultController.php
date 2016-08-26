<?php

namespace COMMANDEPHOTO\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('COMMANDEPHOTOAdminBundle:Default:index.html.twig');
    }
}
