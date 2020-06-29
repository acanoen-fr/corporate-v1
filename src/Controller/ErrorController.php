<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ErrorController extends AbstractController
{
    /**
     * @Route("/_error", name="error_404")
     */
    public function NotFound()
    {
        return $this->render('_error/404.html.twig');
    }
}
