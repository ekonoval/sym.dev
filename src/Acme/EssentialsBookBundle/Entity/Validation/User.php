<?php
namespace Acme\EssentialsBookBundle\Entity\Validation;

use Symfony\Component\Security\Core\Role\Role;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @Assert\GroupSequence({"User", "Strict"})
 */
class User implements UserInterface
{
    /**
    * @Assert\NotBlank
    */
    public $username;

    /**
    * @Assert\NotBlank
    */
    public $password;

    /**
     * @Assert\True(message="The password cannot match your username", groups={"Strict"})
     */
    public function isPasswordLegal()
    {
        return ($this->username !== $this->password);
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        //TODO: Implement getUsername() method.
    }

    //<editor-fold desc="stubs">
    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        //TODO: Implement getSalt() method.
    }

    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string The password
     */
    public function getPassword()
    {
        //TODO: Implement getPassword() method.
    }

    /**
     * Returns the roles granted to the user.
     *
     * <code>
     * public function getRoles()
     * {
     *     return array('ROLE_USER');
     * }
     * </code>
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return Role[] The user roles
     */
    public function getRoles()
    {
        //TODO: Implement getRoles() method.
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        //TODO: Implement eraseCredentials() method.
    }
    //</editor-fold>


}