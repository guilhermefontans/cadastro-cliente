<?php

namespace App\Form;

use App\Entity\Cliente;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClienteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class,[
                'label' => 'form.label.customer.name',
                'attr' => [
                    'placeholder' => 'form.label.customer.placeholder.name'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'form.label.customer.email',
                'attr' => [
                    'placeholder' => 'form.label.customer.placeholder.email'
                ],
            ])
            ->add('cpf', TextType::class, [
                'attr' => [
                    'placeholder' => '123.456.789-10'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cliente::class,
        ]);
    }
}
