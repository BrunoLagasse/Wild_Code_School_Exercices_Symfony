<?php

namespace App\Form;

use App\Entity\Season;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class SeasonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('number', IntegerType::class,[
                'label' => 'Numero de la saison',
                'attr' => [
                    'placeholder' => 'numero de la saison'
                ]
            ])
            ->add('year', IntegerType::class,[
                'label' => 'Année de la sortie',
                'attr' => [
                    'placeholder' => 'année de la sortie'
                ]
            ])
            ->add('description', TextareaType::class,[
                'label' => 'Description',
                'attr' => [
                    'placeholder' => 'Description de la serie'
                ]
            ])

            ->add('program', null, [
                'choice_label' => 'title',
                'label' => 'Programme'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Season::class,
        ]);
    }
}
