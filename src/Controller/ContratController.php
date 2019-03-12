<?php

namespace App\Controller;

use App\Entity\CONTRAT;
use App\Form\contratType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/contrat")
 */
class ContratController extends AbstractController
{
	/**
     * @Route("/new", name="newContrat")
     */
    public function new(Request $request)
    {
        $newContrat = new CONTRAT();
        $form = $this->createForm(ContratType::class, $newContrat);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $newContrat = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($newContrat);
            $entityManager->flush();

            return $this->redirectToRoute('listContrat');
        }

        return $this->render('contrat/new.html.twig', array('form' => $form->createView(),));
    }

    /**
     * @Route("/edit/{id}", name="editContrat", requirements={"id"="\d+"})
     */
    public function edit($id, Request $request)
    {
        $editContrat = $this->getDoctrine()->getManager()->getRepository(CONTRAT::class)->find($id);

        $form = $this->createForm(contratType::class, $editContrat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() && $request->isMethod('POST')) 
        {
            $editContrat = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->flush();

            return $this->redirectToRoute('listContrat');
        }

        return $this->render('contrat/edit.html.twig', array(
        'form' => $form->createView(),'contrat' => $editContrat
        ));
    }

    /**
     * @Route("/delete/{id}", name="deleteContrat", requirements={"id"="\d+"})
     */
    public function delete($id)
    {
        $suppBD = $this->getDoctrine()->getManager();

        // On crée un objet, instance de CONTRAT
        $suppContrat = new CONTRAT();

        $suppContrat = $suppBD->getRepository(CONTRAT::class)->find($id);

        // Suppression du CONTRAT
        $suppBD->remove($suppContrat);

        // Exécution
        $suppBD->flush();

        return $this->redirectToRoute('listContrat');
    }

    /**
     * @Route("/list", name="listContrat")
     */
    public function list()
    {
        // ---------------------------------------
        // Récupération de la liste des contrats
        // ---------------------------------------
        $repository = $this->getDoctrine()->getManager()->getRepository(CONTRAT::class);

        $listContrat = $repository->findAll();
        // -------------------------------------------------------------
        // On demande à la vue d'afficher la liste des contrats
        // -------------------------------------------------------------
        return $this->render('contrat/list.html.twig', array('lesContrats' => $listContrat)); // On affecte le tableau à la vue
    }
}
