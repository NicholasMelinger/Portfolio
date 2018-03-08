<?php
namespace PortfolioBundle\Form\Cup;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use PortfolioBundle\Entity\Cursus;
use PortfolioBundle\Entity\Utilisateurs;
use PortfolioBundle\Entity\Competences;

class CupType extends AbstractType {

	public function buildForm (FormBuilderInterface $builder, array $options) {

		$builder->add('cursus', EntityType::class, array('class' => Cursus::class,'label' => 'Cursus :'))
				  ->add('competences', EntityType::class, array('class' => Competences::class,'label' => 'Compétences obtenues :'))
    			  ->add('diplome', IntegerType::class, array('label' => 'Diplôme obtenu :'))
    			  ->getForm();
	}
	public function configureOptions (OptionsResolver $resolver) {

		$resolver->setDefaults(array('data_class' => 'PortfolioBundle\Entity\Experiences',));
	}
}