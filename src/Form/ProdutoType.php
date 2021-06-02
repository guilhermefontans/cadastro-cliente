<?php

namespace App\Form;

use App\Entity\Produto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\Validator\Constraints\NotNull;

class ProdutoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /** @var Produto|null $produto */
        $produto = $options['data'] ?? null;
        $isEdit = $produto && $produto->getId();

        $builder
            ->add('description')
            ->add('value')
            ->add('lojas')
        ;

        $imageConstraints = [
            new Image([
                'maxSize' => '5M'
            ])
        ];

        if (!$isEdit || !$produto->getPhoto()) {
            $imageConstraints[] = new NotNull([
                'message' => 'Please upload an image',
            ]);
        }

        $builder
            ->add('imageFile', FileType::class, [
                'mapped' => false,
                'required' => false,
                'constraints' => $imageConstraints
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produto::class,
        ]);
    }
}
