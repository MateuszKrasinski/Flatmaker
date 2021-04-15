<?php


namespace App\Controller;


use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UserController extends AbstractController
{

    public function login(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(User::class)->findOneByEmail("krasinski@gmail.com");
        if (!$user) {
            throw $this->createNotFoundException(
                'No user found for email '
            );
        }

        $user->setName('New product name!');
        $entityManager->flush();

        return new Response('Found user with id: '.$user->getId());

    }


    public function register(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = new User();
        $user->setName("Mateusz");
        $user->setSurname("Krasinski");
        $user->setPhone("886014492");
        $user->setEmail("krasinski@gmail.com");
        $entityManager->persist($user);
        $entityManager->flush();
        return new Response('Saved new user with id'.$user->getId());
    }


}