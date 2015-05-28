<?php
namespace Acme\EssentialsBookBundle\Controller;

use Acme\EssentialsBookBundle\Entity\Form\Task;
use Acme\EssentialsBookBundle\Helpers\BundleController;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class FormController extends BundleController
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        pa();
        exit;
    }

    /**
     * @Route("/new", name="ebb_form_new")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        // create a task and give it some dummy data for this example
        $task = new Task();
        $task->setTask('Write a blog post');
        $task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($task)
            ->add('task', 'text')
            ->add('dueDate', 'date')
            ->add('save', 'submit', array('label' => 'Create Task'))
            ->add('saveAndAdd', 'submit', array('label' => 'Save and Add'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {

            $form->get('saveAndAdd')->isClicked();

            return $this->redirectToRoute('ebb_form_new', ['done' => time()]);
        }

        return $this->renderAuto('Form', 'new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
