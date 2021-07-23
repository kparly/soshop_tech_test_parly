<?php

namespace App\Controller;

use App\Entity\CompteBanquaire;
use App\Form\CompteBanquaireType;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CompteBanquaireController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/accounts/get")
     */
    public function getAllBancAccountsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $comptes = $em->getRepository(CompteBanquaire::class)->findAll();

        $comptesValide = [];
        foreach ($comptes as $compte){
            if($compte->isUtilisateurDeletedAt() === true){
                array_push($comptesValide, $compte);
          }
        }

        return $this->handleView($this->view($comptesValide));
    }

    /**
     * @Rest\Get("/account/get/{id}")
     */
    public function getBancAccountAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $compte = $em->getRepository(CompteBanquaire::class)->find($id);

        return $this->handleView($this->view($compte));
    }

    /**
     * @Rest\Post("/account/add")
     */
    public function addBancAccountAction(Request $request){
        $account = new CompteBanquaire();
        $form = $this->createForm(CompteBanquaireType::class,$account);
        $data = json_decode($request->getContent(), true);
        $form->submit($data);
        if($form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($account);
            $em->flush();
            return $this->handleView($this->view(['status'=>'ok'],Response::HTTP_CREATED));
        }
        return $this->handleView($this->view($form->getErrors()));
    }

    /**
     * @Rest\Patch("/account/update/{id}")
     */
    public function updateBancAccountAction(Request $request, $id){
        $em = $this->getDoctrine()->getManager();
        $account = $em->getRepository(CompteBanquaire::class)->find($id);
        $form = $this->createForm(CompteBanquaireType::class,$account);
        $data = json_decode($request->getContent(), true);
        $form->submit($data, false);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($account);
            $em->flush();
            return $this->handleView($this->view(['status'=>'ok'],Response::HTTP_CREATED));
        }
        return $this->handleView($this->view($form->getErrors()));
    }
}
