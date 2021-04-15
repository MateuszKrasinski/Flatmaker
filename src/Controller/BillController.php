<?php


namespace App\Controller;


use App\Entity\Bill;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\Json;

class BillController extends AbstractController

{
    public function settle():Response{

    }
    public function new():Response{
        $entityManager = $this->getDoctrine()->getManager();
        $bill = new Bill();
        $bill->setFromId(3);
        $bill->setToId(4);
        $bill->setValue(20);
        $bill->setDescription("Chleb");
        $bill->setSettled(false);
        $entityManager->persist($bill);
        $entityManager->flush();
        return new Response('Saved new bill with id'.$bill->getId());
    }
    public function delete($id=4):JsonResponse{
        $bill = $this->getDoctrine()->getRepository(Bill::class)->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($bill);
        $entityManager->flush();
        return new JsonResponse('Deleted bill: '.$id);
    }
    public function getBills():JsonResponse{
        $bills = $this->getDoctrine()->getRepository(Bill::class)->findAll();
        return new JsonResponse(['array'=>$bills]);
    }
}