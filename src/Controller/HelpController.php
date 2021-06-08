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
//        $groupID = 1;
//        $fromID = 56;
//        $toID = 57;
//        $name = 'item3';
//        $value = 30;
//        $type = 1;
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

    public function getHelps($id_group = 23): Response
    {
        $repositoryHelp = $this->getDoctrine()->getRepository(Help::class);
        $helps = $repositoryHelp->findBy(['id_group' => $id_group]);
        $allHelps = [];
        foreach ($helps as $help) {
            $help->getIdGroup()->getRelation();
            $help->getIdType()->getRelation();
            $help->getIdFrom()->getRelation();
            $help->getIdFrom()->getIdRole()->getRelation();
            $help->getIdFrom()->getIdUser()->getRelation();
            $help->getIdTo()->getIdUser()->getRelation();
            $help->getIdTo()->getIdRole()->getRelation();
            $help->getIdTo()->getIdUser()->getRelation();
            array_push($allHelps, $help);
        }
        return $this->render('help/index.html.twig', [
            'json' => $allHelps,
            'message' => 'Got all helps to group'
        ]);

    }
}
