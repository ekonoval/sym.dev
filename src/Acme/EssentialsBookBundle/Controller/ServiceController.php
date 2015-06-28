<?php
namespace Acme\EssentialsBookBundle\Controller;

use Acme\EssentialsBookBundle\Helpers\Service\BookMailer;
use Acme\EssentialsBookBundle\Helpers\BundleController;
use Acme\EssentialsBookBundle\Helpers\PlainResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ServiceController extends BundleController
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
//        $this->_t1();
        $this->t2();
        return new PlainResponse();
    }

    private function t2()
    {
        $manager = $this->get('newsletter_manager');
        pa($manager);
    }

    private function _t1()
    {
        /** @var BookMailer $mailer */
        $mailer = $this->get('my_mailer');

        $mailer1 = $this->get('my_mailer');

        pa($mailer);
    }
}
