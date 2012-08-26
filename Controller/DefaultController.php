<?php

namespace Amp\PDFCrowdBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AmpPDFCrowdBundle:Default:index.html.twig', array('name' => $name));
    }
}
