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
use PortfolioBundle\Entity\Types_utilisateur;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;
class UtilisateursType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //$object = (types_utilisateur) array('id' => 3);
        //'id' => '3'];
        //$em = $this->getEntityManager()->getRepository(PortfolioBundle::types_utilisateur)
        //-/>find(3);
$idTag= $builder->getData()->getId();
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
                    'query_builder' => function(EntityRepository $er) use ($idTag)
                    {
                            $qb = $er->createQueryBuilder('t')
                            ->where('t.id != 1');
                            return $qb->orderBy('t.id', 'ASC');
                    }));
                    //'label'=>'Vous êtes : * ')
                    //);
                // ->add('type_utilisateur', ChoiceType::class, array(
                //         'choices'  => array(
                //         'Elève' => $object,
                //         'Professionnel' => $object,
                //         'Recruteur' => $object), 'label'=>'Vous êtes :'));
                // ->add('type_utilisateur', EntityType::class, array(
                //     'class'        => 'PortfolioBundle:Types_utilisateur',
                //     'choice_label' => 'libelle',
                //     'label'=>'Vous êtes : * ')
                //     );

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
