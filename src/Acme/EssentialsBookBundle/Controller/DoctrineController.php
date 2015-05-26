<?php
namespace Acme\EssentialsBookBundle\Controller;

use Acme\EssentialsBookBundle\Helpers\BundleController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DoctrineController extends BundleController
{
    /**
     * @Route("/db")
     */
    public function indexAction()
    {
        pa("exit DOC"); exit;
    }
}
