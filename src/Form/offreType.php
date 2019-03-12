<?php

namespace App\Form;

use App\Entity\OFFRE;
use App\Entity\CONTRAT;
use App\Entity\JOB;
/* use App\Entity\COMPETENCE;*/
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

class offreType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('title', TextType::class, array('label' => 'Titre de l\'offre'))
			->add('description', TextType::class, array('label' => 'Description de l\'offre'))
			->add('idContrat', EntityType::class, array('class' => CONTRAT::class,'choice_label' => 'lastName', 'label'=>'Contrat associé'))
			->add('idJob', EntityType::class, array('class' => JOB::class,'choice_label' => 'lastName', 'label'=>'Job associé'))
			->add('save', SubmitType::class, array('label' => 'Valider'))
	        ->getForm();
	}
}
?>
