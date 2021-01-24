<?php

namespace App\Controller;

use App\Entity\TennisCourt;
use App\Entity\User;
use App\Form\TennisCourtType;
use App\Repository\TennisCourtRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tennis/court")
 */
class TennisCourtController extends AbstractController
{
    /**
     * @Route("/", name="tennis_court_index", methods={"GET"})
     */
    public function index(TennisCourtRepository $tennisCourtRepository): Response
    {
        return $this->render('tennis_court/index.html.twig', [
            'tennis_courts' => $tennisCourtRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{owner}/new", name="tennis_court_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tennisCourt = new TennisCourt();
        $form = $this->createForm(TennisCourtType::class, $tennisCourt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $tennisCourt->setOwner($this->getUser());
            $entityManager->persist($tennisCourt);
            $entityManager->flush();

            return $this->redirectToRoute('tennis_court_index');
        }

        return $this->render('tennis_court/new.html.twig', [
            'tennis_court' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tennis_court_show", methods={"GET"})
     */
    public function show(TennisCourt $tennisCourt): Response
    {
        return $this->render('tennis_court/show.html.twig', [
            'tennis_court' => $tennisCourt,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="tennis_court_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TennisCourt $tennisCourt): Response
    {
        $form = $this->createForm(TennisCourtType::class, $tennisCourt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tennis_court_index');
        }

        return $this->render('tennis_court/edit.html.twig', [
            'tennis_court' => $tennisCourt,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tennis_court_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TennisCourt $tennisCourt): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tennisCourt->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tennisCourt);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tennis_court_index');
    }
}
