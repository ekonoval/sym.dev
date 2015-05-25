<?php
namespace Acme\EssentialsBookBundle\Controller;

use Acme\EssentialsBookBundle\Helpers\BundleController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class BlogController extends BundleController
{
    /**
     * @Route("/blog/{slug}", name="blog_show")
     */
    public function showAction($slug)
    {
        pa($slug);
    }

}
