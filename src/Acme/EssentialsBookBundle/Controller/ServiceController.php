<?php
namespace Acme\EssentialsBookBundle\Controller;

use Acme\EssentialsBookBundle\Helpers\BundleController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ServiceController extends BundleController
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        pa(); exit;
    }
}
