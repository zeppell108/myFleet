<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Event;
use AppBundle\Entity\EventElement;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\SecurityContext;

class MyFleetController extends Controller
{
    /**
     * @Route("/", name="main")
     * @param Request $request
     * @return
     */
    public function indexAction(Request $request)
    {
//        $this->temp1();


        $event = new Event();

//        $eventElement->setEvent($event);

        $form = $this->createForm('AppBundle\Form\EventType', $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() ) {

            echo '<pre>' . print_r($form->getData(), true) . '</pre>';die();

            foreach ($form->getData()->geteventElement() as $element){

            }

//            $eventElement = new EventElement();
//            $event->getEventElement()->add($eventElement);



            $em = $this->getDoctrine()->getManager();

            $em->persist($event);
            $em->persist($eventElement);

            $em->flush();

//            echo '<pre>' . var_export($form->getData()->getVehicle(), true) . '</pre>';die();
//
//            echo '!!!!!!'; die();
        }

//        $formEventElement = $this->createForm('AppBundle:Form:EventElement', $eventElement);
//
//        $formEventElement->handleRequest($request);
//
//        if ($formEventElement->isSubmitted() && $formEventElement->isValid()) {
//            $eventElement->setEvent($event);
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($eventElement);
//            $em->persist($event);
//            $em->flush();
//        }

//        if ()


        $request = $this->container->get('request');
        /* @var $request \Symfony\Component\HttpFoundation\Request */
        $session = $request->getSession();
        /* @var $session \Symfony\Component\HttpFoundation\Session\Session */

        // get the error if any (works with forward and redirect -- see below)
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } elseif (null !== $session && $session->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = '';
        }

        if ($error) {
            // TODO: this is a potential security risk (see http://trac.symfony-project.org/ticket/9523)
            $error = $error->getMessage();
        }
        // last username entered by the user
        $lastUsername = (null === $session) ? '' : $session->get(SecurityContext::LAST_USERNAME);

        $csrfToken = $this->container->has('form.csrf_provider')
            ? $this->container->get('form.csrf_provider')->generateCsrfToken('authenticate')
            : null;

        return $this->renderHome([
            'last_username'     => $lastUsername,
            'error'             => $error,
            'csrf_token'        => $csrfToken,
            'form'              => $form->createView(),
        ]);
    }

    protected function renderHome(array $data)
    {
        $template = sprintf('home.html.%s', $this->container->getParameter('fos_user.template.engine'));

        return $this->container->get('templating')->renderResponse($template, $data);
    }

    public function checkAction()
    {
        throw new \RuntimeException('You must configure the check path to be handled by the firewall using form_login in your security firewall configuration.');
    }

    public function logoutAction()
    {
        throw new \RuntimeException('You must activate the logout in your security firewall configuration.');
    }

    public function temp1()
    {
        $em = $this->getDoctrine()->getManager();
        $eve = $em->getRepository('AppBundle:Event')->findAll();

        $originalElements = new ArrayCollection();

        // Create an ArrayCollection of the current Tag objects in the database
        foreach ($eve as $item) {
            $originalElements->add($item->getEventElement());
        }
        echo '<pre>' . var_export($originalElements, true) . '</pre>';
        die();
    }
}
