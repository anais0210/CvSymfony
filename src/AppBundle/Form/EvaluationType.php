<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * class EvaluationType
 */
class EvaluationType extends AbstractType
{
    /**
     * 
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pseudo', null, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Pseudo'],
                'label_attr' => ['class' => ''],
            ])
            ->add('commentaire', TextareaType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'commentaire'],
                'label_attr' => ['class' => ''],
            ])
            ->add('envoyer', SubmitType::class, [
                'attr' => ['class' => 'btn btn-primary'],
            ])
            ->add('note', HiddenType::class, [
                'attr' => ['class' => 'star-input'],
                'label_attr' => ['class' => 'hide'],
            ])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Evaluation',
        ));
    }
}
