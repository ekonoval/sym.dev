<?php
namespace Acme\EssentialsBookBundle\Form\Type;

use Acme\EssentialsBookBundle\Entity\Form\Task;
use Acme\EssentialsBookBundle\Entity\Form\TaskWithCategory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TaskTypeWithCategory extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('task')
            //->add('dueDate', null, array('widget' => 'single_text'))
            ->add('dueDate', 'date', array('widget' => 'single_text'))
            ->add('category', new CategoryType())
            ->add('fake', 'checkbox', array('mapped' => false))
            ->add('save', 'submit')
        ;
    }

    public function getName()
    {
        return 'taskPlusCatFrm';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TaskWithCategory::class
        ]);
    }


}