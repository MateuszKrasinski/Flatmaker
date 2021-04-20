<?php

namespace App\Controller;

use App\Entity\Group;
use App\Entity\GroupToUser;
use App\Entity\User;
use App\Repository\GroupRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GroupController extends AbstractController
{

    /**
     * @Route("/group", name="group")
     */
    public function index(): Response
    {
        return $this->render('group/index.html.twig', [
            'controller_name' => 'GroupController',
        ]);
    }

    public function createGroup($id_user = 2, $name = "group", $desc = 'Opis'): Response
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $user = $repository->find($id_user);
        $entityManager = $this->getDoctrine()->getManager();
        $group = new Group();
        $group->setName("Group1");
        $group->setDescription("Description");
        $entityManager->persist($group);
        $entityManager->flush();
        $groupToUser = new GroupToUser();
        $groupToUser->setIdUser($user);
        $groupToUser->setIdGroup($group);
        return new Response('Saved new group with id' . $group->getId());
    }
}
