<?php

namespace App\Controller;

use App\Entity\JOB;
use App\Form\jobType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/job")
 */
class JobController extends AbstractController
{
    /**
     * @Route("/new", name="newJob")
     */
    public function new(Request $request)
    {
        $newJob = new JOB();
        $form = $this->createForm(jobType::class, $newJob);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $newJob = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($newJob);
            $entityManager->flush();

            return $this->redirectToRoute('listJob');
        }

        return $this->render('job/new.html.twig', array('form' => $form->createView(),));
    }

    /**
     * @Route("/edit/{id}", name="editJob", requirements={"id"="\d+"})
     */
    public function edit($id, Request $request)
    {
        $editJob = $this->getDoctrine()->getManager()->getRepository(JOB::class)->find($id);

        $form = $this->createForm(jobType::class, $editJob);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() && $request->isMethod('POST')) 
        {
            $editJob = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->flush();

            return $this->redirectToRoute('listJob');
        }

        return $this->render('job/edit.html.twig', array(
        'form' => $form->createView(),'job' => $editJob
        ));
    }

    /**
     * @Route("/delete/{id}", name="deleteJob", requirements={"id"="\d+"})
     */
    public function delete($id)
    {
        $suppBD = $this->getDoctrine()->getManager();

        // On crée un objet, instance de JOB
        $suppJob = new JOB();

        $suppJob = $suppBD->getRepository(JOB::class)->find($id);

        // Suppression du JOB
        $suppBD->remove($suppJob);

        // Exécution
        $suppBD->flush();

        return $this->redirectToRoute('listJob');
    }

    /**
     * @Route("/list", name="listJob")
     */
    public function list()
    {
        // ---------------------------------------
        // Récupération de la liste des jobs
        // ---------------------------------------
        $repository = $this->getDoctrine()->getManager()->getRepository(JOB::class);

        $listJob = $repository->findAll();
        // -------------------------------------------------------------
        // On demande à la vue d'afficher la liste des jobs
        // -------------------------------------------------------------
        return $this->render('job/list.html.twig', array('lesJobs' => $listJob)); // On affecte le tableau à la vue
    }
}
