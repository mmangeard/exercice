<?php

namespace App\Form;

use App\Entity\CANDIDATURE;
use App\Entity\OFFRE;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\Form\Type\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class candidatureType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('lastName', TextType::class, array('label' => 'Nom du candidat'))
			->add('firstName', TextType::class, array('label' => 'Prénom du candidat'))
			->add('email', EmailType::class, array('label' => 'Email du candidat'))
			->add('cv', TextareaType::class, array('label' => 'CV du candidat'))
			->add('idOffre', EntityType::class, array('class' => OFFRE::class,'choice_label' => 'title', 'label'=>'Offre'))
	        ->add('save', SubmitType::class, array('label' => 'Valider'))
	        ->getForm();
	}
}
?>
