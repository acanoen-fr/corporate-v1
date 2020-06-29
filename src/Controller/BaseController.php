<?php

namespace App\Controller;

use \Symfony\Component\HttpFoundation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/email/send", name="base_email_send", methods={"POST"})
     * @param Request $request
     * @return HttpFoundation\JsonResponse
     */
    public function sendEmail(Request $request)
    {
        $req = json_decode($request->getContent(), true);
        $isSuccess = true;
        $error = '';

        if (!isset($req['name']) && !isset($req['email']) && !isset($req['subject']) && !isset($req['message'])) {
            $isSuccess = false;
            $error = 'Tous les champs doivent être renseignés.';
        }

        if (!filter_var($req['email'], FILTER_VALIDATE_EMAIL)) {
            $isSuccess = false;
            $error = 'L\'adresse e-mail n\'est pas renseigné dans le bon format.';
        }

        if ($isSuccess) {
            $headers = 'MIME-Version: 1.0' . "\r\n" .
                'Content-Type: text/html; charset=UTF-8' . "\r\n" .
                "From: {$req['name']} <{$req['email']}>" . "\r\n" .
                "Reply-To: {$req['name']} <{$req['email']}>" . "\r\n";
            @mail('contact@acanoen.fr', $req['subject'], $req['message'], $headers);
            $error = 'Votre demande a bien été envoyée et sera traitée le plus rapidement possible.';
        }

        return $this->json([
            'isSend' => $isSuccess,
            'message' => $error,
            'data' => $req
        ]);
    }

    /**
     * @Route("/mentions", name="base_mentions")
     */
    public function mentions()
    {
        return $this->render('base/mentions.html.twig');
    }
}
