<?php
namespace Acme\EssentialsBookBundle\Helpers;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BundleController extends Controller
{
    protected $bundleName;

    function __construct()
    {
        $this->init();
    }

    protected function init()
    {
        $this->bundleName = 'AcmeEssentialsBookBundle';
    }

    public function renderAuto($ctrl, $template, $assignVars = [])
    {
        return $this->render("{$this->bundleName}:{$ctrl}:{$template}", $assignVars);
    }

    /**
     * @return EntityManager
     */
    public function getDoctrineEntityManager()
    {
        return $this->getDoctrine()->getManager();
    }

    /**
     * @param $repoName
     * @return EntityRepository
     */
    public function getDoctrineRepo($repoName)
    {
        return $this->getDoctrine()->getRepository($repoName);
    }

}
