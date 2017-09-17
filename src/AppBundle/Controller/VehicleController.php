<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Vehicle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class VehicleController extends Controller
{
    /**
     * @Route("/vehicle")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $vehicle = new Vehicle();
        $form = $this->createForm('AppBundle\Form\VehicleType', $vehicle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $vehicle->setUser($this->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($vehicle);
            $em->flush();
        }

        return $this->render('vehicle.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/user")
     */
    public function newAction()
    {
        return $this->render('AppBundle:Vehicle:new.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/user")
     */
    public function editAction()
    {
        return $this->render('AppBundle:Vehicle:edit.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/user")
     */
    public function deleteAction()
    {
        return $this->render('AppBundle:Vehicle:delete.html.twig', array(
            // ...
        ));
    }

}
