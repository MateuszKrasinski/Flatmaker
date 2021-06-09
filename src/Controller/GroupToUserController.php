<?php

namespace App\Controller;

use App\Entity\GroupToUser;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GroupToUserController extends AbstractController
{

    public function index(): Response
    {
        return $this->render('group_to_user/index.html.twig', [
            'controller_name' => 'GroupToUserController',
        ]);
    }
    public function getUserGroup(): Response
    {
//        $data = json_decode($request->getContent(),false);
//        $id = $data->id;

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $repository = $this->getDoctrine()->getRepository(GroupToUser::class);
        $result =  $repository->findAll();
        $result->getIdUser()->getRelation();
        $response->setContent(json_encode($result));
        return $response;
    }
}
