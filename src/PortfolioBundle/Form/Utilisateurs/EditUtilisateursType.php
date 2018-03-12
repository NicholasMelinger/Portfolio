<?php

namespace PortfolioBundle\Form\Utilisateurs;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class EditUtilisateursType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('mailUtilisateur', EmailType::class,array('label'=>'Adresse email : *'))
                ->add('numeroMobile',TextType::class,array('label'=>'Numéro de mobile : '))
                ->add('numeroFixe', TextType::class,array('label'=>'Numéro de fixe : '))
                ->add('adressePostale', TextType::class,array('label'=>'Numéro de nom de rue : '))
                ->add('ville', TextType::class,array('label'=>'Ville : '))
                ->add('codePostal', TextType::class,array('label'=>'Code postal : '));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PortfolioBundle\Entity\Utilisateurs'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'portfoliobundle_utilisateurs';
    }


}
