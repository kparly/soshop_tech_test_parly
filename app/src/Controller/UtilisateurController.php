<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\UtilisateurType;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UtilisateurController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/users/get")
     */
    public function getAllUsersAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository(Utilisateur::class)->findBy([
            'deletedAt' => null
        ]);

        return $this->handleView($this->view($users));
    }

    /**
     * @Rest\Get("/user/get/{id}")
     */
    public function getUserAction($id){
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(Utilisateur::class)->find($id);

        return $this->handleView($this->view($user));
    }

    /**
     * @Rest\Post("/user/add")
     */
    public function addUserAction(Request $request){
        $user = new Utilisateur();
        $form = $this->createForm(UtilisateurType::class,$user);
        $data = json_decode($request->getContent(), true);
        $form->submit($data);
        if($form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $this->handleView($this->view(['status'=>'ok'],Response::HTTP_CREATED));
        }
        return $this->handleView($this->view($form->getErrors()));
    }

    /**
     * @Rest\Patch("/user/update/{id}")
     */
    public function updateUserAction(Request $request, $id){
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(Utilisateur::class)->find($id);
        $form = $this->createForm(UtilisateurType::class,$user);
        $data = json_decode($request->getContent(), true);
        $form->submit($data, false);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($user);
            $em->flush();
            return $this->handleView($this->view(['status'=>'ok'],Response::HTTP_CREATED));
        }
        return $this->handleView($this->view($form->getErrors()));
    }
}
