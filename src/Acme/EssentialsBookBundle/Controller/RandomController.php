<?php
namespace Acme\EssentialsBookBundle\Controller;

use Acme\EssentialsBookBundle\Helpers\BundleController;
use Acme\EssentialsBookBundle\Helpers\PlainResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RandomController extends BundleController
{
    public function indexAction(Request $request, $limit)
    {
        $number = rand(0, $limit);

        //$obj = new AppController();

        //pa($request);

        //return new PlainResponse('rand');
        //return $this->render('AcmeEssentialsBookBundle:Random:index.html.twig');
        return $this->renderAuto('Random', 'index.html.twig', ['number' => $number]);
    }
}
