<?php

namespace App\Form;

use App\Entity\Actor;
use App\Entity\Program;
use Symfony\Component\Form\AbstractType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ProgramType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class,[
                'label' => 'Titre du programme',
                'attr' => [
                    'placeholder' => 'Ex: Fear the Walking Dead'
                ]
            ])
            ->add('summary', TextareaType::class,[
                'label' => 'Description du programme',
                'attr' => [
                    'placeholder' => 'Description du programme'
                ]
            ])
/*             ->add('poster', UrlType::class,[
                'label' => 'Image du programme',
                'attr' => [
                    'placeholder' => 'Entrez l\'url de l\'affiche'
                ]
            ]) */
            ->add('country', TextType::class,[
                'label' => 'Pays du programme',
                'attr' => [
                    'placeholder' => 'Ex: Chine'
                ]
            ])
            ->add('year', IntegerType::class,[
                'label' => 'Année du programme',
                'attr' => [
                    'placeholder' => 'Ex: 2020'
                ]
            ])
            ->add('category', null, ['choice_label' => 'name'])
            ->add('actors', EntityType::class, [
                'label' => 'Acteurs',
                'class' => Actor::class,
                'choice_label' => 'selector',
                'multiple' => true,
                'expanded' => true,
                'by_reference' => false
            ])
            ->add('posterFile', VichFileType::class, [
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_uri' => true, // not mandatory, default is true
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Program::class,
        ]);
    }
}
