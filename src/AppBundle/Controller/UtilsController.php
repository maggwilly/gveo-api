<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Systeme;
use AppBundle\Entity\Operation;
use AppBundle\Entity\Marque;
use AppBundle\Entity\Piece;
use AppBundle\Form\PieceType;
use AppBundle\Entity\InfoInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations as Rest; // alias pour toutes les annotations
/**
 * Reparation controller.
 *
 */
class UtilsController extends Controller
{
    /**
     * Creates a new Produit entity.
     *@Rest\View(serializerGroups={"full"})
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:'.$request->get('entityName'))->findAll();

        return  $entities;
      
    }


    /**
     * Creates a new Produit entity.
     *@Rest\View(serializerGroups={"full"})
     */
    public function createMarqueAction(Request $request)
    {
        $entity = new Marque();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        $form->submit($request->request->all(),false); // Validation des d
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
           return ['success'=>true,'data'=>$entity];
        }
        return  $form;
    }
   
      /**
     * Creates a new Produit entity.
     *@Rest\View(serializerGroups={"full"})
     */
    public function createPiecesAction(Request $request)
    {
            $em = $this->getDoctrine()->getManager();
            foreach ($request->request->all() as $key => $entityform) {
                $entity = new Piece();
                $form = $this->createCreateForm($entity);
                 $form->submit($entityform,false); 
                 $em->persist($entity);
            }
            $em->flush();
           return ['success'=>true,'data'=>$data];
  
    } 
    /**
     * Creates a new Produit entity.
     *@Rest\View(serializerGroups={"full"})
     */
    public function createSystemeAction(Request $request)
    {
        $entity = new Systeme();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        $form->submit($request->request->all(),false); // Validation des d
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
           return ['success'=>true,'data'=>$entity];
        }
        return  $form;
    }
 
    /**
     * Creates a new Produit entity.
     *@Rest\View(serializerGroups={"full"})
     */
    public function createOperationAction(Request $request)
    {
        $entity = new Operation();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        $form->submit($request->request->all(),false); // Validation des d
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
           return ['success'=>true,'data'=>$entity];
        }
        return  $form;
    }
 
    /**
     * Creates a form to create a Produit entity.
     * @param Produit $entity The entity
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(InfoInterface $entity)
    {

        $form = $this->createForm($entity->getClassType(), $entity);
        return $form;
    }



    private function getConnectedUser(){
    return $this->get('security.token_storage')->getToken()->getUser();
}
}
