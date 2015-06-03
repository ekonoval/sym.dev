<?php
namespace Acme\EssentialsBookBundle\Helpers\Service;

class BookMailer
{
    private $transport;

    function __construct($transport)
    {
        $this->transport = $transport;
    }

    public function send($email)
    {

    }

}
