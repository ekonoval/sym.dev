<?php
namespace Acme\EssentialsBookBundle\Controller;

use Acme\EssentialsBookBundle\Entity\Form\Task;
use Acme\EssentialsBookBundle\Entity\Form\TaskWithCategory;
use Acme\EssentialsBookBundle\Form\Type\TaskType;
use Acme\EssentialsBookBundle\Form\Type\TaskTypeWithCategory;
use Acme\EssentialsBookBundle\Helpers\BundleController;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Validator\Constraints\NotBlank;

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
     * @Route("/non-class-form")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function actionNonClassForm(Request $request)
    {
        $defaultData = array('message' => 'Type your message here');
        $form = $this->createFormBuilder($defaultData)
            ->add('name', 'text', ['constraints' => [new NotBlank()]])
            ->add('email', 'email')
            ->add('message', 'textarea')
            ->add('send', 'submit')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $data = $form->getData();
            pa($data);
        }

        return $this->renderAuto('Form', 'new.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/new-taksk-and-category")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newTaskPlusCategory(Request $request)
    {
        $taskWithCat = new TaskWithCategory();

        $form = $this->createForm(new TaskTypeWithCategory());

        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $data = $form->getData();
        }

        return $this->renderAuto('Form', 'new.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/new-service")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newWithServicesAction(Request $request)
    {
        $task = new Task();
        $form = $this->createForm('taskFrm', $task);

        return $this->renderAuto('Form', 'new.html.twig', array(
            'form' => $form->createView(),
        ));
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

        $form = $this->createForm(new TaskType());
        $form->handleRequest($request);

        //$form->get('fake')->getData();
        //$form->get('fake')->setData(true);

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
