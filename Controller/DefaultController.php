<?php

namespace LPStudio\ApiAIBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ApiAIBundle:Default:index.html.twig');
    }
}
