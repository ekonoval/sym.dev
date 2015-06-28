<?php
namespace Acme\EssentialsBookBundle\Helpers;

use Symfony\Component\HttpFoundation\Response;

class PlainResponse extends Response
{
    public function __construct($content = '', $status = 200, $headers = array())
    {
        $content = "<html><body>{$content}</body></html>";
        parent::__construct($content, $status, $headers);
    }

}
