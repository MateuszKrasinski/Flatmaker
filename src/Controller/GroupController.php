<?php

namespace App\Controller;

use App\Entity\Group;
use App\Entity\GroupToUser;
use App\Entity\User;
use App\Repository\GroupRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

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

    public function createGroup($id_user = 2, $name = "group2", $desc = 'Opis3'): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $group = new Group();
        $group->setName("Group1");
        $group->setDescription("Description");
        $repositoryUser = $this->getDoctrine()->getRepository(User::class);
        $user = $repositoryUser->find($id_user);
        $groupToUser = new GroupToUser();

        $user->addRelation($groupToUser);
        $group->addRelation($groupToUser);
        $entityManager->persist($group);
        $entityManager->persist($groupToUser);

        $entityManager->flush();
        return $this->json(['content' => 'newGroup', 'group_id' => $group->getId()]);
    }

    public function getGroup($id_group = 1): Response
    {
        $repositoryUser = $this->getDoctrine()->getRepository(User::class);
        $repositoryGroup = $this->getDoctrine()->getRepository(Group::class);
        $repositoryGroupToUser = $this->getDoctrine()->getRepository(GroupToUser::class);
        $entityManager = $this->getDoctrine()->getManager();

        $group = $repositoryGroup->find(21);
        $participants = $repositoryGroupToUser->findBy(['id_group' => 21]);
        if ($participants) {
            return $this->render('group/index.html.twig',
                ['json' => ['id' => $group->getId(), 'name' => $group->getName(),
                    'desc' => $group->getDescription(), 'participants' => $participants,]]
            );
        } else
            return $this->json(['message' => 'No participants']);
    }

    public function getGroups($id_group = 1): Response
    {
        $repositoryUser = $this->getDoctrine()->getRepository(User::class);
        $repositoryGroup = $this->getDoctrine()->getRepository(Group::class);
        $repositoryGroupToUser = $this->getDoctrine()->getRepository(GroupToUser::class);
        $entityManager = $this->getDoctrine()->getManager();

        $result = [];
        $groups = $repositoryGroup->findAll();
        foreach ($groups as $group) {
            $participants = $repositoryGroupToUser->findBy(['id_group' => $group->getId()]);
            array_push($result, ['json' => ['id' => $group->getId(), 'name' => $group->getName(),
                'desc' => $group->getDescription(), 'participants' => $participants,]]);

        }
        return $this->render('group/index.html.twig',
            ['json' => $result]
        );
    }
}
