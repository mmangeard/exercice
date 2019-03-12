<?php

namespace App\Controller;

use App\Entity\CANDIDATURE;
use App\Form\candidatureType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/candidature")
 */
class CandidatureController extends AbstractController
{
    /**
     * @Route("/new", name="newCandidature")
     */
    public function new(Request $request)
    {
        $newCandidature = new CANDIDATURE();
        $form = $this->createForm(candidatureType::class, $newCandidature);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $newCandidature = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($newCandidature);
            $entityManager->flush();

            return $this->redirectToRoute('listCandidature');
        }

        return $this->render('candidature/new.html.twig', array('form' => $form->createView(),));
    }

    /**
     * @Route("/edit/{id}", name="editCandidature", requirements={"id"="\d+"})
     */
    public function edit($id, Request $request)
    {
        $editCandidature = $this->getDoctrine()->getManager()->getRepository(CANDIDATURE::class)->find($id);

        $form = $this->createForm(candidatureType::class, $editCandidature);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() && $request->isMethod('POST')) 
        {
            $editCandidature = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->flush();

            return $this->redirectToRoute('listCandidature');
        }

        return $this->render('candidature/edit.html.twig', array(
        'form' => $form->createView(),'candidature' => $editCandidature
        ));
    }

    /**
     * @Route("/delete/{id}", name="deleteCandidature", requirements={"id"="\d+"})
     */
    public function delete($id)
    {
        $suppBD = $this->getDoctrine()->getManager();

        // On crée un objet, instance de CANDIDATURE
        $suppCandidature = new CANDIDATURE();

        $suppCandidature = $suppBD->getRepository(CANDIDATURE::class)->find($id);

        // Suppression du CANDIDATURE
        $suppBD->remove($suppCandidature);

        // Exécution
        $suppBD->flush();

        return $this->redirectToRoute('listCandidature');
    }

    /**
     * @Route("/list", name="listCandidature")
     */
    public function list()
    {
        // ---------------------------------------
        // Récupération de la liste des candidatures
        // ---------------------------------------
        $repository = $this->getDoctrine()->getManager()->getRepository(CANDIDATURE::class);

        $listCandidature = $repository->findAll();
        // -------------------------------------------------------------
        // On demande à la vue d'afficher la liste des candidatures
        // -------------------------------------------------------------
        return $this->render('candidature/list.html.twig', array('lesCandidatures' => $listCandidature)); // On affecte le tableau à la vue
    }
}
