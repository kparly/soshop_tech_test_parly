<?php

namespace App\Controller;

use App\Entity\CarteBanquaire;
use App\Form\CarteBanquaireType;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CarteBanquaireController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/cards/get")
     */
    public function getAllCardAction()
    {
        $em = $this->getDoctrine()->getManager();
        $cartes = $em->getRepository(CarteBanquaire::class)->findAll();

        return $this->handleView($this->view($cartes));
    }

    /**
     * @Rest\Get("/card/get/{id}")
     */
    public function getCardAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $carte = $em->getRepository(CarteBanquaire::class)->find($id);

        return $this->handleView($this->view($carte));
    }

    /**
     * @Rest\Post("/card/add")
     */
    public function addCardAction(Request $request){
        $carte = new CarteBanquaire();
        $form = $this->createForm(CarteBanquaireType::class,$carte);
        $data = json_decode($request->getContent(), true);
        $form->submit($data);
        if($form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($carte);
            $em->flush();
            return $this->handleView($this->view(['status'=>'ok'],Response::HTTP_CREATED));
        }
        return $this->handleView($this->view($form->getErrors()));
    }

    /**
     * @Rest\Patch("/card/update/{id}")
     */
    public function updateCardAction(Request $request, $id){
        $em = $this->getDoctrine()->getManager();
        $carte = $em->getRepository(CarteBanquaire::class)->find($id);
        $form = $this->createForm(CarteBanquaireType::class,$carte);
        $data = json_decode($request->getContent(), true);
        $form->submit($data, false);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($carte);
            $em->flush();
            return $this->handleView($this->view(['status'=>'ok'],Response::HTTP_CREATED));
        }
        return $this->handleView($this->view($form->getErrors()));
    }
}