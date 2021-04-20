<?php

namespace App\Controller;

use App\Entity\Group;
use App\Entity\Help;
use App\Entity\Role;
use App\Entity\Type;
use App\Entity\User;
use App\Entity\UserDetails;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
    public function createHelp(): Response
    {
        $groupID=23;
        $fromID=2; $toID=9; $type=1;
        $repositoryUser = $this->getDoctrine()->getRepository(User::class);
        $repositoryGroup = $this->getDoctrine()->getRepository(Group::class);
        $repositoryHelp= $this->getDoctrine()->getRepository(Help::class);
        $repositoryType= $this->getDoctrine()->getRepository(Type::class);
        $userFrom = $repositoryUser->find($fromID);
        $userFrom->getIdRole()->getRelation();
        $userFrom->getIdUser()->getRelation();

        $userTo = $repositoryUser->find($toID);
        $userTo->getIdRole()->getRelation();
        $userTo->getIdUser()->getRelation();

        $typeClass = $repositoryType->find($type);

        $group = $repositoryGroup->find($groupID);

        $help = new Help();
        $help->setIdFrom($userFrom);
        $help->setIdTo($userTo);
        $help->setIdType($typeClass);
        $help->setIdGroup($group);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($help);
        $entityManager->flush();

        return $this->render('help/index.html.twig', [
            'json' => $help,
            'message'=>'Created new Help'
        ]);

    }
    public function getHelps($id_group=23): Response
    {
        $repositoryHelp= $this->getDoctrine()->getRepository(Help::class);
        $helps = $repositoryHelp->findBy(['id_group'=>$id_group]);
        $allHelps = [];
        foreach ($helps as $help){
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
            'message'=>'Got all helps to group'
        ]);

    }
}
