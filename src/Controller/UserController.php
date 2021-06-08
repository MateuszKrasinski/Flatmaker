<?php

namespace App\Controller;

use App\Entity\Role;
use App\Entity\User;
use App\Entity\UserDetails;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\SecurityBundle;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserController extends AbstractController
{
    private $session;
    private $security;

    public function __construct()
    {
        $this->security =  new SecurityBundle();
    }

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
        $user->setDetails($user_details);
        $user->setPassword('password1!');

        // tell Doctrine you want to (eventually) save the user (no queries yet)
        $entityManager->persist($user);
        $entityManager->flush();

        return $this->render('user/index.html.twig',
            ['json' => $user,
                'message' => 'Created new user']
        );


    }

    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        $repositoryUser = $this->getDoctrine()->getRepository(User::class);
        $user = $repositoryUser->findOneBy(['email' => 'mail@gmail.com', 'password' => 'password1',]);

        if (!$user) {
            return new Response('Try again email/password: ');
        }
        return $this->render('user/index.html.twig',
            ['json' => $user,
                'last_username' => $lastUsername,
                'error'         => $error,]);
    }
}
