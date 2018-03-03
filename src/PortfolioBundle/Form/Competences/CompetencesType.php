<?php
namespace PortfolioBundle\Form\Competences;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use PortfolioBundle\Entity\Cursus;

class CompetencesType extends AbstractType {

	public function buildForm (FormBuilderInterface $builder, array $options) {

		$builder->add('typeExperience', TextType::class, array('label' => 'Type experience :'))
    			  ->add('dureeExperience', TextType::class, array('label' => 'Durée :'))
    			  ->add('descriptionExperience', TextareaType::class, array('label' => 'Description :'))
    			  ->add('cursus', EntityType::class, array('class' => Cursus::class,'label' => 'Cursus :'))
    			  ->getForm();
	}
	public function configureOptions (OptionsResolver $resolver) {

		$resolver->setDefaults(array('data_class' => 'PortfolioBundle\Entity\Competences',));
	}
}