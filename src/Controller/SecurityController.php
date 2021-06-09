<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\UserDetails;
use App\Form\UserRegistrationFormType;
use App\Security\LoginFormAuthenticator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(Request $request,UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $data = json_decode($request->getContent(),false);
        $repositoryUser = $this->getDoctrine()->getRepository(User::class);
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        $response->setContent('some problems');
        $user = $repositoryUser->findOneBy(['email'=>$data->email]) ;
        if ( $user && $passwordEncoder->isPasswordValid($user, $data->password) ){
            $response->setContent($user->getId());
        }
        else{
            $response->setContent('wrong password');
        }

        return $response;
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
    /**
     * @Route("/register", name="app_register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, GuardAuthenticatorHandler $guardHandler, LoginFormAuthenticator $formAuthenticator): Response
    {

            $data = json_decode($request->getContent());
           $user = new User();

        $user->setEmail($data->email);
           $user->setPassword($data->password);
            $user->setPassword($passwordEncoder->encodePassword(
                $user,
                $user->getPassword()
            ));
            $user->setRoles($user->getRoles());
            $em = $this->getDoctrine()->getManager();
            $userDetails = new UserDetails();
            $entityManager = $this->getDoctrine()->getManager();
            $user_details = new UserDetails();
//            $user_details->setName('Name');
//            $user_details->setSurname('Surname');
//            $user_details->setPhone('Phone number');
//            $user_details->setPhoto('person1');
            $entityManager->persist($user_details);
            $entityManager->flush();
            $user->setDetails($user_details);
            $em->persist($user);
            $em->flush();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
//        $response->setContent($guardHandler->authenticateUserAndHandleSuccess(
//        $user,
//        $request,
//        $formAuthenticator,
//        'main'
//    ));
        $response->setContent(json_encode($user_details));

        return $response;
    }
}
