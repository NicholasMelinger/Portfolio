<?php
namespace PortfolioBundle\Form\Competences;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompetencesType extends AbstractType {

	public function buildForm (FormBuilderInterface $builder, array $options) {

		$builder->add('libelleCompetence', TextType::class, array('label' => 'Libellé :'))
    			  ->getForm();
	}
	public function configureOptions (OptionsResolver $resolver) {

		$resolver->setDefaults(array('data_class' => 'PortfolioBundle\Entity\Competences',));
	}
}