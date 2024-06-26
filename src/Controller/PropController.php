<?php

namespace App\Controller;

use App\Entity\Prop;
use App\Form\PropType;
use App\Repository\PropRepository;
use App\Repository\InterventionRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

<<<<<<< HEAD
/**
 * @Route("/prop")
 */
class PropController extends AbstractController
{
    /**
     * @Route("/", name="prop_index", methods={"GET"})
     */
=======
#[Route('/prop')]
class PropController extends AbstractController
{
    #[Route("/", name: "prop_index", methods: ["GET"])]
>>>>>>> origin/production
    public function index(PropRepository $propRepository): Response
    {
        return $this->render('prop/index.html.twig', [
            'props' => $propRepository->findAll(),
        ]);
    }

<<<<<<< HEAD
    /**
     * @Route("/new", name="prop_new", methods={"GET","POST"})
     */
=======
    #[Route("/new", name: "prop_new", methods: ["GET","POST"])]
>>>>>>> origin/production
    public function new(Request $request): Response
    {
        $prop = new Prop();
        $form = $this->createForm(PropType::class, $prop);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($prop);
            $entityManager->flush();

            if ( $request->query->has('s') == 'intervention') {
                return $this->redirectToRoute('intervention_new');
            }
            
            return $this->redirectToRoute('prop_show', [
                'id' => $prop->getId(),
            ]);
        }

        return $this->render('prop/new.html.twig', [
            'prop' => $prop,
            'form' => $form->createView(),
        ]);
    }

<<<<<<< HEAD
    /**
     * @Route("/{id}", name="prop_show", methods={"GET"})
     */
=======
    #[Route("/{id}", name: "prop_show", methods: ["GET"])]
>>>>>>> origin/production
    public function show(Prop $prop, InterventionRepository $interventionRepository): Response
    {
        $interventions = $interventionRepository->findAllByProp($prop->getId());

        return $this->render('prop/show.html.twig', [
            'prop' => $prop,
            'interventions' => $interventions,
        ]);
    }

<<<<<<< HEAD
    /**
     * @Route("/{id}/edit", name="prop_edit", methods={"GET","POST"})
     */
=======
    #[Route("/{id}/edit", name: "prop_edit", methods: ["GET","POST"])]
>>>>>>> origin/production
    public function edit(Request $request, Prop $prop): Response
    {
        $form = $this->createForm(PropType::class, $prop);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('prop_show', [
                'id' => $prop->getId(),
            ]);
        }

        return $this->render('prop/edit.html.twig', [
            'prop' => $prop,
            'form' => $form->createView(),
        ]);
    }

<<<<<<< HEAD
    /**
     * @Route("/{id}", name="prop_delete", methods={"DELETE"})
     */
=======
    #[Route("/{id}", name: "prop_delete", methods: ["DELETE"])]
>>>>>>> origin/production
    public function delete(Request $request, Prop $prop): Response
    {
        if ($this->isCsrfTokenValid('delete'.$prop->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($prop);
            $entityManager->flush();
        }

        return $this->redirectToRoute('prop_index');
    }
}
