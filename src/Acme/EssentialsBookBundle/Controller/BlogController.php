<?php
namespace Acme\EssentialsBookBundle\Controller;

use Acme\EssentialsBookBundle\Helpers\BundleController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Routing\Router;

class BlogController extends BundleController
{
//    /**
//     * @Route("/blog/{slug}", name="blog_show")
//     */
//    public function showAction($slug)
//    {
//        pa($slug);
//    }

    /**
     * @Route("/blog/{page}", defaults={"page": 1}, requirements={"page": "\d+" })
     */
    public function indexAction($page)
    {

        pa('page', $page);
    }

    /**
     * @Route("/blog/{slug}", defaults={"slug": 122}, name="acme_esb_blog_slug")
     */
    public function blogSlugAction($slug)
    {
        /** @var Router $router */
        $router = $this->get('router');
        $params = $router->match('/blog/my-blog-post');
        pa($params);

        $url = $router->generate('acme_esb_blog_slug', ['slug' => 'my-fake- slu\g']);
        pa($url);

        pa('slug', $slug);
        pa($_route);
    }
}
