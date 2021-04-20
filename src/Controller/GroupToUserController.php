<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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

}
