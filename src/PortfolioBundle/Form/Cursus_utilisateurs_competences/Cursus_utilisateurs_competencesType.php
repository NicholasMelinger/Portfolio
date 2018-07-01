<?php

namespace PortfolioBundle\Form\Cursus_utilisateurs_competences;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use PortfolioBundle\Entity\Cursus;
use PortfolioBundle\Entity\Competences;
use Doctrine\ORM\EntityRepository;
class Cursus_utilisateurs_competencesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('cursus', EntityType::class, array(
    'class' => Cursus::class,
    'query_builder' => function (EntityRepository $er) {
        return $er->createQueryBuilder('u')
            ->orderBy('u.libelleFormation', 'ASC');
    },
    'label' => 'Cursus'))
        ->add('annee', TextType::class, array('label'=>'Année :'))->add('diplome', ChoiceType::class, array(
    'choices'  => array(
        'Oui' => true,
        'Non' => false), 'label'=>'Diplôme obtenu ?')

    )->add('competences', EntityType::class, array(
    'class' => Competences::class,
    'query_builder' => function (EntityRepository $er) {
        return $er->createQueryBuilder('u')
            ->orderBy('u.libelleCompetence', 'ASC');
    },
    'label' => 'Compétence acquise lors de ce cursus :'));
        //->add('nomUtilisateur',TextType::class,array('label'=>'Nom : *'))
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PortfolioBundle\Entity\Cursus_utilisateurs_competences'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'portfoliobundle_cursus_utilisateurs_competences';
    }


}
