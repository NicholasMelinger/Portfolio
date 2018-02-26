<?php

namespace PortfolioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UtilisateursType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nomUtilisateur')->add('prenomUtilisateur')->add('mailUtilisateur')->add('loginUtilisateur')->add('mdpUtilisateur')->add('mdpUtilisateurEncode')->add('numeroMobile')->add('numeroFixe')->add('dateInscription')->add('dateMajProfil')->add('adressePostale')->add('ville')->add('codePostal')->add('jourNaissance')->add('moisNaissance')->add('anneeNaissance')->add('type_utilisateur');
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
