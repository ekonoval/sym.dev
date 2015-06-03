<?php
namespace Acme\EssentialsBookBundle\Helpers\Service;

class NewsletterManager
{
    protected $mailer;

    function __construct(BookMailer $mailer)
    {
        $this->mailer = $mailer;
    }


}
