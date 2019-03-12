<?php

namespace App\Form;

use App\Entity\CONTRAT;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\Form\Type\Entity;

class contratType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('lastName', TextType::class, array('label' => 'Titre du contrat'))
	        ->add('save', SubmitType::class, array('label' => 'Valider'))
	        ->getForm();
	}
}
?>
