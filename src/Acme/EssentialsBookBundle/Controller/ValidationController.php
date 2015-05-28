<?php
namespace Acme\EssentialsBookBundle\Controller;
use Acme\EssentialsBookBundle\Entity\Author;
use Acme\EssentialsBookBundle\Entity\Validation\User;
use Acme\EssentialsBookBundle\Entity\Validation\UserWithGroupProvider;
use Acme\EssentialsBookBundle\Helpers\BundleController;
use Acme\EssentialsBookBundle\Helpers\PlainResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator;

use Symfony\Component\Validator\Constraints as Assert;

class ValidationController extends BundleController
{
    /**
     * @Route("/validate")
     */
    public function indexAction()
    {
//        $res = $this->v1();
//        $this->validateUser();
//        $this->groupProviderTest();
        $this->validatePlainEmail();

        if (empty($res)) {
            $res = new PlainResponse('validation response');
        }

        return $res;
    }

    private function validatePlainEmail()
    {
        $email = "qqq@gmail.com";
//        $email = "qqq@@gmail.com ";
        $emailConstraint = new Assert\Email();
        $emailConstraint->message = "Hey! Email is incorrect";
        $emailConstraint->checkMX = true;

        $errors = (string)$this->getValidator()->validate($email, $emailConstraint);
        echo $errors;
    }

    private function groupProviderTest()
    {
        $user = new UserWithGroupProvider();
        $user->name = 111;
        $user->creditCard = ' ';

        $errors = (string) $this->getValidator()->validate($user);

        echo $errors;
    }

    private function getValidator()
    {
        /** @var Validator\LegacyValidator $validator */
        $validator = $this->get('validator');
        return $validator;
    }

    private function validateUser()
    {
        $user = new User();
        //$user->username

        $validator = $this->getValidator();
        $errors = $validator->validate($user);
        $errorsString = (string) $errors;
        echo($errorsString);
    }

    private function v1()
    {
        $author = new Author();
        //$author->name = 'fake';
        //$author->gender = null;

        /** @var Validator\LegacyValidator $validator */
        $validator = $this->get('validator');
        $errors = $validator->validate($author);
        //$errors = $validator->validate($author, null, ['Author']);

        if (count($errors) > 0) {
            /*
             * Uses a __toString method on the $errors variable which is a
             * ConstraintViolationList object. This gives us a nice string
             * for debugging.
             */
            $errorsString = (string)$errors;

            return new PlainResponse($errorsString);
        }

        return new PlainResponse('The author is valid! Yes!');
    }
}
