<?php
namespace Acme\EssentialsBookBundle\Controller;

use Acme\EssentialsBookBundle\Entity\Form\Task;
use Acme\EssentialsBookBundle\Form\Type\TaskType;
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
     * @Route("/new-type")
     * @param Request $request
     * @return Response
     */
    public function newTypeAction(Request $request)
    {

        $task = new Task();
//        $task->setTask('Write a blog post');
//        $task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createForm(new TaskType(), $task);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $form->get('saveAndAdd')->isClicked();

            return $this->redirectToRoute('ebb_form_new', ['done' => time()]);
        }

        $tpl = 'new.html.twig';
        return $this->renderAuto('Form', $tpl, array(
            'form' => $form->createView(),
        ));
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
//        $task->setTask('Write a blog post');
//        $task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($task)
            ->add('task', 'text')
            ->add('dueDate', 'date', array('widget' => 'single_text'))
            ->add('comment', 'textarea')
            ->add('save', 'submit', array('label' => 'Create Task'))
            ->add('saveAndAdd', 'submit', array('label' => 'Save and Add'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {

            $form->get('saveAndAdd')->isClicked();

            return $this->redirectToRoute('ebb_form_new', ['done' => time()]);
        }

        $tpl = 'new.html.twig';
        if ($request->query->get('manual', 0) == 1) {
            $tpl = 'new-manual.html.twig';
        }

        return $this->renderAuto('Form', $tpl, array(
            'form' => $form->createView(),
        ));
    }
}
