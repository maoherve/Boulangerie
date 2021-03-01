<?php

namespace App\Form;

use App\Entity\Timetable;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TimetableType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('morning',TextType::class, [
                'label' => 'Matin'
            ])
            ->add('afternoon',TextType::class, [
                'label' => 'Après-midi'
            ])
            ->add('close',TextType::class, [
                'label' => 'Fermé'
            ])
            ->add('winterHoliday',TextType::class, [
                'label' => 'Vacances d\'hiver'
            ])
            ->add('summerHoliday',TextType::class, [
                'label' => 'Vacances d\'été'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Timetable::class,
        ]);
    }
}
