<?php
namespace Acme\EssentialsBookBundle\Controller;
use Acme\EssentialsBookBundle\Entity\Author;
use Acme\EssentialsBookBundle\Helpers\BundleController;
use Acme\EssentialsBookBundle\Helpers\PlainResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator;

class ValidationController extends BundleController
{
    /**
     * @Route("/validate")
     */
    public function indexAction()
    {
        $res = $this->v1();

        if (empty($res)) {
            $res = new PlainResponse('validation response');
        }

        return $res;
    }

    private function v1()
    {
        $author = new Author();
        $author->name = 'fake';

        /** @var Validator\LegacyValidator $validator */
        $validator = $this->get('validator');
        $errors = $validator->validate($author);

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
