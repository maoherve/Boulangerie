<?php

namespace App\Form;

use App\Entity\Timetable;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TimetableType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('morning')
            ->add('afternoon')
            ->add('close')
            ->add('winterHoliday')
            ->add('summerHoliday')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Timetable::class,
        ]);
    }
}
