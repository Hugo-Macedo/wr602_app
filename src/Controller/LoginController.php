<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LoginController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
    
        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUsername = $authenticationUtils->getLastUsername();

        $user = $this->getUser();


        return $this->render('login/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
            'user' => $user
        ]);
    }
    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): RedirectResponse
    {
        // throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
        // redirect to home
        return $this->redirectToRoute('app_home');
    }
}
