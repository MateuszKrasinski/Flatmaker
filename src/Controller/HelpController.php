<?php

namespace App\Controller;

use App\Entity\Group;
use App\Entity\Help;
use App\Entity\Role;
use App\Entity\Type;
use App\Entity\User;
use App\Entity\UserDetails;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelpController extends AbstractController
{

    public function index(): Response
    {
        return $this->render('help/index.html.twig', [
            'controller_name' => 'HelpController',
        ]);
    }

    public function createHelp(Request $request): Response
    {
            $data = json_decode($request->getContent(),false);
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $groupID = $data->groupID;

        $fromID = $data->fromID;

        $toID = $data->toID;
        $name = $data->name;
        $type=$data->type;
        $value=$data->value;
        $isActive = false;

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $repositoryUser = $this->getDoctrine()->getRepository(User::class);
        $repositoryGroup = $this->getDoctrine()->getRepository(Group::class);
        $repositoryType = $this->getDoctrine()->getRepository(Type::class);

        $userFrom = $repositoryUser->find($fromID);
        $userFrom->getDetails()->getRelation();
        $userTo = $repositoryUser->find($toID);
        $userTo->getDetails()->getRelation();
        $typeClass = $repositoryType->find($type);

        $group = $repositoryGroup->find($groupID);

        $help = new Help();
        $help->setIdFrom($userFrom);
        $help->setIdTo($userTo);
        $help->setIdType($typeClass);
        $help->setIdGroup($group);
        $help->setName($name);
        $help->setIsActive(false);
        $help->setValue($value);


        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($help);
        $entityManager->flush();
        $response->setContent('xD');
        return $response;

    }

    public function removeHelp(Request $request): Response
    {
        $data = json_decode($request->getContent(),false);
        $helpID = $data->id;
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $repositoryHelp = $this->getDoctrine()->getRepository(Help::class);
        $help = $repositoryHelp->find($helpID);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($help);
        $entityManager->flush();
        $response->setContent($help->getId());
        return $response;
    }

}
