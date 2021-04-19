<?php

namespace App\Controller;

use App\Entity\Role;
use App\Entity\User;
use App\Entity\UserDetails;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
    public function createUser(): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createuser(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();
        $user_details = new UserDetails();
        $user_details->setName('Jan');
        $user_details->setSurname('Kot');
        $user_details->setPhone('123456789');
        $entityManager->persist($user_details);
        $entityManager->flush();

        $role = new Role();
        $role->setRole("User");
        $entityManager->persist($role);
        $entityManager->flush();
        $user = new User();
        $user->setEmail('mail@gmail.com');
        $user->setIdUser($user_details);
        $user->setIdRole($role);
        $user->setPassword('password1!');
        $user->setCreatedAt(new DateTime());

        // tell Doctrine you want to (eventually) save the user (no queries yet)
        $entityManager->persist($user);
        $entityManager->flush();

        return new Response('Saved new user with id '.$user->getId());


    }

    public function login(): Response
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $user = $repository->findOneBy(['email' => 'mail@gmail.com', 'password'=>'password1!',]);
        if (!$user) {
            return new Response('Try again email/password: ');
        }
        return new Response('Logged user with id: '.$user->getId());
    }
}
