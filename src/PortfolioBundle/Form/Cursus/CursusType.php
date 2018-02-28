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

		$builder->add('libelleFormation', TextType::class, array('label' => 'Libellé :'))
    			  ->add('descriptionFormation', TextareaType::class, array('label' => 'Description :'))
    			  ->getForm();
	}
	public function configureOptions (OptionsResolver $resolver) {

		$resolver->setDefaults(array('data_class' => 'PortfolioBundle\Entity\Cursus',));
	}
}