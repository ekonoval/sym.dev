<?php

namespace Acme\EssentialsBookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeEssentialsBookBundle:Default:index.html.twig', array('name' => $name));
    }
}
