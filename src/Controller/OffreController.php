<?php

namespace App\Controller;

use App\Entity\OFFRE;
use App\Form\offreType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/offre")
 */
class OffreController extends AbstractController
{
    /**
     * @Route("/new", name="newOffre")
     */
    public function new(Request $request)
    {
        $newOffre = new OFFRE();
        $form = $this->createForm(offreType::class, $newOffre);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $newOffre = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($newOffre);
            $entityManager->flush();

            return $this->redirectToRoute('listOffre');
        }

        return $this->render('offre/new.html.twig', array('form' => $form->createView(),));
    }

    /**
     * @Route("/edit/{id}", name="editOffre", requirements={"id"="\d+"})
     */
    public function edit($id, Request $request)
    {
        $editOffre = $this->getDoctrine()->getManager()->getRepository(OFFRE::class)->find($id);

        $form = $this->createForm(offreType::class, $editOffre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() && $request->isMethod('POST')) 
        {
            $editOffre = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->flush();

            return $this->redirectToRoute('listOffre');
        }

        return $this->render('offre/edit.html.twig', array(
        'form' => $form->createView(),'offre' => $editOffre
        ));
    }

    /**
     * @Route("/delete/{id}", name="deleteOffre", requirements={"id"="\d+"})
     */
    public function delete($id)
    {
        $suppBD = $this->getDoctrine()->getManager();

        // On crée un objet, instance de OFFRE
        $suppOffre = new OFFRE();

        $suppOffre = $suppBD->getRepository(OFFRE::class)->find($id);

        // Suppression du OFFRE
        $suppBD->remove($suppOffre);

        // Exécution
        $suppBD->flush();

        return $this->redirectToRoute('listOffre');
    }

    /**
     * @Route("/list", name="listOffre")
     */
    public function list()
    {
        // ---------------------------------------
        // Récupération de la liste des offres
        // ---------------------------------------
        $repository = $this->getDoctrine()->getManager()->getRepository(OFFRE::class);

        $listOffre = $repository->findAll();
        // -------------------------------------------------------------
        // On demande à la vue d'afficher la liste des offres
        // -------------------------------------------------------------
        return $this->render('offre/list.html.twig', array('lesOffres' => $listOffre)); // On affecte le tableau à la vue
    }
}
