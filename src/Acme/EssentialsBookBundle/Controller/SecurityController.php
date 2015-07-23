<?php
namespace Acme\EssentialsBookBundle\Controller;

use Acme\EssentialsBookBundle\Helpers\BundleController;
use Acme\EssentialsBookBundle\Helpers\PlainResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class SecurityController extends BundleController
{
    /**
     * @Route("/admin")
     */
    public function adminAction()
    {
        return new PlainResponse();
    }

    /**
     * @Route("/admin/test")
     * @return PlainResponse
     */
    public function adminTestAction()
    {
        $user = $this->getUser();

        return new PlainResponse();
    }

    /**
     * @Route("/nonadmin/hello")
     * //@Security("has_role('ROLE_ADMIN')")
     */
    public function actionHello()
    {
//        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException('Custom denied1');
        }

        //$this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page1!');

        //return new PlainResponse();
        return  $this->renderAuto('Security', 'common.html.twig');
    }
}
