<?php

namespace minsal\academicaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('minsalacademicaBundle:Default:index.html.twig', array('name' => $name));
    }
}
