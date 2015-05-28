<?php
namespace Acme\EssentialsBookBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Author
{
    /**
     * @Assert\NotBlank()
     */
    public $name;

    /**
     * @Assert\Choice(
     *     choices = { "male", "female", "other" },
     *     message = "Choose a valid gender."
     * )
     */
    public $gender;
}
