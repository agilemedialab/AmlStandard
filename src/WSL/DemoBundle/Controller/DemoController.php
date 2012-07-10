<?php

namespace WSL\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DemoController extends Controller
{
    public function __construct($templating) {
        $this->templating = $templating;
    }

    public function indexAction($name)
    {
        return $this->templating->renderResponse('WSLDemoBundle:Demo:index.html.twig',
            array('name' => $name)
        );
    }

}
