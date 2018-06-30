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
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UtilisateursType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nomUtilisateur',TextType::class,array('label'=>'Nom : *'))
                ->add('prenomUtilisateur',TextType::class,array('label'=>'Prénom : *'))
                ->add('mailUtilisateur', EmailType::class,array('label'=>'Adresse e-mail : *'))
                ->add('username',TextType::class,array('label'=>"Nom d'utilisateur (celui-ci vous servira lors de votre connexion, au même titre que votre adresse email) : *"))
                ->add('plainPassword', RepeatedType::class, array(
                    'type' => PasswordType::class,
                    'first_options'  => array('label' => 'Mot de passe : *'),
                    'second_options' => array('label' => 'Confirmer le mot de passe : *'),
                    ))
                ->add('numeroMobile',TextType::class,array('label'=>'Numéro de téléphone mobile : *'))
                ->add('numeroFixe', TextType::class,array('label'=>'Numéro de téléphone fixe : *'))
                ->add('adressePostale', TextType::class,array('label'=>'Numéro et nom de rue : *'))
                ->add('ville', TextType::class,array('label'=>'Ville : *'))
                ->add('codePostal', TextType::class,array('label'=>'Code postal : *'))
                ->add('dateNaissance',BirthdayType::class, array(
                        'label'=>'Date de naissance : ',
                        'format' => 'dd-MM-yyyy') 
                    )
                ->add('type_utilisateur', EntityType::class, array(
                    'class'        => 'PortfolioBundle:Types_utilisateur',
                    'choice_label' => 'libelle',
                    'label'=>'Vous êtes : * ')
                    );

                //$builder->remove('type_utilisateur');
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
