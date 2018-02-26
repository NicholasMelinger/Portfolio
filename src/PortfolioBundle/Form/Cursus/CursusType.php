<?php
namespace PortfolioBundle\Form\Cursus;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CursusType extends AbstractType {

	public function buildForm (FormBuilderInterface $builder, array $options) {

		$builder->add('libelle_formation', TextType::class, array('label' => 'Libellé :'))
    			  ->add('annee_formation', IntegerType::class, array('label' => 'Année :'))
    			  ->add('description_formation', TextareaType::class, array('label' => 'Description :'))
    			  ->add('Valider', SubmitType::class)
    			  ->getForm();
	}
	public function configureOptions (OptionsResolver $resolver) {

		$resolver->setDefaults(array('data_class' => 'PortfolioBundle\Entity\Experiences',));
	}
}