<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Entity\Vehicle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Repository\ServiceTypeRepository;
use Symfony\Component\Security\Core\SecurityContext;
use AppBundle\Form\ServiceTypeType;

class MyFleetController extends Controller
{
    /**
     * @Route("/", name="main")
     * @param Request $request
     * @return
     */
    public function indexAction(Request $request) //Request $request
    {
//        echo '<pre>' . var_export($this->getUser(), true) . '</pre>';die();
        $this->getUser()
        ? $vehicles = $this->getDoctrine()->getRepository('AppBundle:Vehicle')->findBy(['user' => $this->getUser()->getId()])
        : $vehicles = [];

        $serviceTypes = $this->getDoctrine()->getRepository('AppBundle:ServiceType')->findBy([], ['id' => 'ASC']);

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
            'serviceTypes'      => $serviceTypes,
            'vehicles'          => $vehicles,
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
}
