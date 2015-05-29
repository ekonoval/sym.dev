<?php
namespace Acme\EssentialsBookBundle\Form\Type;

use Acme\EssentialsBookBundle\Entity\Form\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $options = [];
        $options = ['label' => 'CategoryName'];

        $builder->add('name', 'text', $options);
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Category::class
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'categoryFrm';
    }


}
