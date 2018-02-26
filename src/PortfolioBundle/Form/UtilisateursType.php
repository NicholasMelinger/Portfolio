<?php

namespace PortfolioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class UtilisateursType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nomUtilisateur')
                ->add('prenomUtilisateur')
                ->add('mailUtilisateur', EmailType::class)
                ->add('username')
                ->add('plainPassword', RepeatedType::class, array(
                    'type' => PasswordType::class,
                    'first_options'  => array('label' => 'Mot de passe'),
                    'second_options' => array('label' => 'Confirmer le mot de passe'),
                    ))
                ->add('numeroMobile')
                ->add('numeroFixe')
                ->add('adressePostale')
                ->add('ville')
                ->add('codePostal')
                ->add('dateNaissance')
                //->add('type_utilisateur');
                ->add('type_utilisateur', EntityType::class, array(
                    'class'        => 'PortfolioBundle:Types_utilisateur',
                    'choice_label' => 'libelle'
                  ));
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
