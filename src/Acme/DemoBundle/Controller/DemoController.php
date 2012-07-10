<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Acme\DemoBundle\Form\ContactType;

class DemoController extends Controller
{
    public function __construct($templating) {
        $this->templating = $templating;
    }

    public function indexAction()
    {
        return $this->render('AcmeDemoBundle:Demo:index.html.twig');
    }

    public function helloAction($name)
    {
        return $this->templating->renderResponse('AcmeDemoBundle:Demo:hello.html.twig', array('name' => $name));
    }

    public function contactAction()
    {
        $form = $this->get('form.factory')->create(new ContactType());

        $request = $this->get('request');
        if ('POST' == $request->getMethod()) {
            $form->bindRequest($request);
            if ($form->isValid()) {
                $mailer = $this->get('mailer');
                // .. setup a message and send it
                // http://symfony.com/doc/current/cookbook/email.html

                $this->get('session')->setFlash('notice', 'Message sent!');

                return new RedirectResponse($this->generateUrl('_demo'));
            }
        }

        return $this->render('AcmeDemoBundle:Demo:contact.html.twig', array('form' => $form));
    }
}
