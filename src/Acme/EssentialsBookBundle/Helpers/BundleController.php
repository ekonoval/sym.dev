<?php
namespace Acme\EssentialsBookBundle\Helpers;

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

    public function renderAuto($ctrl, $template, $assignVars)
    {
        return $this->render("{$this->bundleName}:{$ctrl}:{$template}", $assignVars);
    }

}
