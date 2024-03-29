<?php

namespace App\Form;

use App\Entity\Categories;
use App\Entity\Products;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;


class ProductsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class, [
                'label' => 'Nom'
            ])
            ->add('categories', null,
                ['choice_label' => 'name',
                    'label' => 'Catégories'
                ])
            ->add('imageName', TextType::class,
                ['label' => 'Nom de l\'image'
                ])
            ->add('imageFile', VichFileType::class, [
                'required' => false,
                'download_label' => false,
                'allow_delete' => false,
                'download_uri' => false,
                'asset_helper' => false,
                'label' => 'Fichier'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Products::class,
        ]);
    }
}
