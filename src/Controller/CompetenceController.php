<?php

namespace App\Controller;

use App\Entity\COMPETENCE;
use App\Form\competenceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/competence")
 */
class CompetenceController extends AbstractController
{
    /**
     * @Route("/new", name="newCompetence")
     */
    public function new(Request $request)
    {
        $newCompetence = new COMPETENCE();
        $form = $this->createForm(competenceType::class, $newCompetence);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $newCompetence = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($newCompetence);
            $entityManager->flush();

            return $this->redirectToRoute('listCompetence');
        }

        return $this->render('competence/new.html.twig', array('form' => $form->createView(),));
    }

    /**
     * @Route("/edit/{id}", name="editCompetence", requirements={"id"="\d+"})
     */
    public function edit($id, Request $request)
    {
        $editCompetence = $this->getDoctrine()->getManager()->getRepository(COMPETENCE::class)->find($id);

        $form = $this->createForm(competenceType::class, $editCompetence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() && $request->isMethod('POST')) 
        {
            $editCompetence = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->flush();

            return $this->redirectToRoute('listCompetence');
        }

        return $this->render('competence/edit.html.twig', array(
        'form' => $form->createView(),'competence' => $editCompetence
        ));
    }

    /**
     * @Route("/delete/{id}", name="deleteCompetence", requirements={"id"="\d+"})
     */
    public function delete($id)
    {
        $suppBD = $this->getDoctrine()->getManager();

        // On crée un objet, instance de COMPETENCE
        $suppJob = new COMPETENCE();

        $suppJob = $suppBD->getRepository(COMPETENCE::class)->find($id);

        // Suppression du COMPETENCE
        $suppBD->remove($suppJob);

        // Exécution
        $suppBD->flush();

        return $this->redirectToRoute('listCompetence');
    }

    /**
     * @Route("/list", name="listCompetence")
     */
    public function list()
    {
        // ---------------------------------------
        // Récupération de la liste des compétences
        // ---------------------------------------
        $repository = $this->getDoctrine()->getManager()->getRepository(COMPETENCE::class);

        $listCompetence = $repository->findAll();
        // -------------------------------------------------------------
        // On demande à la vue d'afficher la liste des compétences
        // -------------------------------------------------------------
        return $this->render('competence/list.html.twig', array('lesCompetences' => $listCompetence)); // On affecte le tableau à la vue
    }
}
