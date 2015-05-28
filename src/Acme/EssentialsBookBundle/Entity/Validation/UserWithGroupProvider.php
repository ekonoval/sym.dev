<?php
namespace Acme\EssentialsBookBundle\Entity\Validation;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\GroupSequenceProviderInterface;

/**
 * @Assert\GroupSequenceProvider
 */
class UserWithGroupProvider implements GroupSequenceProviderInterface
{
    /**
     * @Assert\NotBlank()
     */
    public $name;

    /**
     * @Assert\CardScheme(
     *     schemes={"VISA"},
     *     groups={"Premium"},
     * )
     */
    public $creditCard;

    public $isPremium = true;

    /**
     * Returns which validation groups should be used for a certain state
     * of the object.
     *
     * @return array An array of validation groups
     */
    public function getGroupSequence()
    {
        $groups = array('User');

        if ($this->isPremium) {
            $groups[] = 'Premium';
        }

        return $groups;
    }


}