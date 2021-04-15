<?php


namespace App\Controller;


use App\Entity\SharedFridge;
use DateTime;
use http\Client\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Constraints\Time;

class SharedFridgeController extends AbstractController
{
    public function return():Response{

    }
    public function new($id_from=3, $id_to=4):JsonResponse{
        $data = new DateTime();
        $entityManager = $this->getDoctrine()->getManager();
        $item = new SharedFridge();
        $item->setIdFrom($id_from);
        $item->setIdTo($id_to);
        $item->setName('Cebula');
        $item->setCreated($data);
        $item->setReturned("false");
        $entityManager->persist($item);
        $entityManager->flush();
        return new JsonResponse('Saved new item with id'.$item->getId());
    }
    public function delete($id=4):JsonResponse{
        $item = $this->getDoctrine()->getRepository(SharedFridge::class)->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($item);
        $entityManager->flush();
        return new JsonResponse('Deleted item: '.$id);
    }
    public function getItems():JsonResponse{
        $items = $this->getDoctrine()->getRepository(Item::class)->findAll();
        return new JsonResponse(['array'=>$items]);
    }
}