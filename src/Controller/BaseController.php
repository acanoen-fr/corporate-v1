<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
    /**
     * @Route("/", name="base_index")
     */
    public function index()
    {
        return $this->render('base/index.html.twig');
    }

    /**
     * @Route("/contact", name="base_contact")
     */
    public function contact()
    {
        return $this->render('base/contact.html.twig');
    }

    /**
     * @Route("/mentions", name="base_mentions")
     */
    public function mentions()
    {
        return $this->render('base/mentions.html.twig');
    }
}
