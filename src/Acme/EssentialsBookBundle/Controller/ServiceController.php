<?php
namespace Acme\EssentialsBookBundle\Controller;

use Acme\EssentialsBookBundle\Helpers\BookMailer;
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
        $this->_t1();
        return new PlainResponse();
    }

    private function _t1()
    {
        /** @var BookMailer $mailer */
        $mailer = $this->get('my_mailer');

        $mailer1 = $this->get('my_mailer');
    }
}
