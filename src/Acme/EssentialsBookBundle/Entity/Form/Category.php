<?php
namespace Acme\EssentialsBookBundle\Entity\Form;

use Symfony\Component\Validator\Constraints as Assert;

class Category
{
    /**
     * @Assert\NotBlank()
     */
    public $name;
}
