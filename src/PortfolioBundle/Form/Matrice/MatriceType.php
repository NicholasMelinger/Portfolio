<?php
namespace PortfolioBundle\Form\Matrice;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use PortfolioBundle\Entity\Themes;
use PortfolioBundle\Entity\Sous_themes;
use PortfolioBundle\Entity\Sous_sous_themes;

class MatriceType extends AbstractType {

	public function buildForm (FormBuilderInterface $builder, array $options) {

		$builder->add('theme_matrice', EntityType::class, array('class' => Themes::class, 'choice_label' => 'libelleTheme', 'label' => 'Thème :'))
				  ->add('s_theme_matrice', EntityType::class, array('class' => Sous_themes::class, 'choice_label' => 'libelleSousTheme', 'label' => 'Sous thème :'))
    			  ->add('s_s_theme_matrice', EntityType::class, array('class' => Sous_sous_themes::class, 'choice_label' => 'libelleSousSousTheme', 'label' => 'Spécifique :'))
    			  ->add('flagActif', IntegerType::class, array('label' => 'Flag :'))
    			  ->getForm();
	}
	public function configureOptions (OptionsResolver $resolver) {

		$resolver->setDefaults(array('data_class' => 'PortfolioBundle\Entity\Matrice',));
	}
}