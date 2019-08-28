<?php


namespace AppBundle\Form;

use AppBundle\Entity\Income;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class IncomeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('incomeName', TextType::class)
            ->add('incomeValue', TextType::class)
            ->add('incomeDate', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Save Income']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            ['data_class' => Income::class]
        );
    }
}
