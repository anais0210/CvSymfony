<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', null, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Nom'],
                'label_attr' => ['class' => '']
            ])
            ->add('prenom', null, [
                'attr' => ['class' => 'form-control', 'placeholder' =>'Prenom'],
                'label_attr' => ['class' =>'']
            ])
            ->add('email', EmailType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' =>'Email'],
                'label_attr' => ['class' =>'']
            ])
            ->add('societe', null, [
                'attr' => ['class' => 'form-control', 'placeholder' =>'Societe'],
                'label_attr' => ['class' =>'']
            ])
            ->add('message', TextareaType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' =>'Message'],
                'label_attr' => ['class' =>'']
            ])
            ->add('envoyer', SubmitType::class,[
                'attr' => ['class' => 'btn btn-primary'],
            ])
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Contact',
            'attr' => ['novalidate' => true]
        ));
    }
}
