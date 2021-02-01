<?php

namespace App\Form;

use App\Entity\Episode;
use App\Entity\Season;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class EpisodeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class,[
                'label' => 'Titre',
                'attr' => [
                    'placeholder' => 'Titre de l\'épisode'
                ]
            ])
            ->add('number', IntegerType::class,[
                'label' => 'Numero de l\'épisode',
                'attr' => [
                    'placeholder' => 'Numéro de l\'épisode'
                ]
            ])
            ->add('synopsis', TextareaType::class,[
                'label' => 'Synopsis',
                'attr' => [
                    'placeholder' => 'Ajoutez le synopsis'
                ]
            ])
            
            ->add('season', null, [
                'class' => Season::class,
                'choice_label' => 'selector',
                'label' => 'Saison'
            ]);
            
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Episode::class,
        ]);
    }
}
