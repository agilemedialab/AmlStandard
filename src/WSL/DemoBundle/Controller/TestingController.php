<?php

namespace WSL\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TestingController extends Controller
{
    public function __construct($templating) {
        $this->templating = $templating;
    }

    public function indexAction($name)
    {
        return $this->templating->renderResponse('WSLDemoBundle:Testing:index.html.twig',
            array('name' => $name)
        );
    }

}

