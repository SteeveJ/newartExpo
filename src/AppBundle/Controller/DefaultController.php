<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\HttpFoundation\reponse;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppBundle:Expo:index.html.twig');
    }
}
