<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Vehicule;
use AppBundle\Form\VehiculeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations as Rest; // alias pour toutes les annotations
/**
 * Vehicule controller.
 *
 */
class VehiculeController extends Controller
{
    /**
     * Lists all vehicule entities.
     *
     */
         /**
     * Creates a new Produit entity.
     *@Rest\View(serializerGroups={"full"})
     */
    public function indexAction()
    {
   $entity = $this->getConnectedUser();
       if (!$entity) {
           throw $this->createNotFoundException('Unable to find user entity.');
          }
           $em = $this->getDoctrine()->getManager();
        $vehicules = $em->getRepository('AppBundle:Vehicule')->findByUser($entity);

        return  $vehicules;
    }
               /**
     * Creates a new Produit entity.
     *@Rest\View(serializerGroups={"full"})
     */
    public function createVehiculeAction(Request $request)
    {
        $entity = new Vehicule();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        $form->submit($request->request->all(),false); // Validation des d
        $user = $this->getConnectedUser();
         if (! $user) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }
        if ($form->isValid()) {
            $entity->setUser($user);
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
          $releve = $em->getRepository('AppBundle:Releve')->findLastByVehicule($entity);
          $couts=$this->couts($entity->getId());
          $entity->setLastReleve($releve);
          $entity->setCouts($couts);
           return $entity;
        }
        return  $form;
    }

    
    public function couts($entity, $annee=0)
    {    $em = $this->getDoctrine()->getManager();
        $coutReparations = $em->getRepository('AppBundle:Reparation')->findCoutTotal($entity, $annee);
        $coutPolices = $em->getRepository('AppBundle:Police')->findCoutTotal($entity, $annee);
        $coutVisites = $em->getRepository('AppBundle:Visite')->findCoutTotal($entity, $annee);
        $coutMaintenances = $em->getRepository('AppBundle:Maintenance')->findCoutTotal($entity, $annee);
        return  array(
            'coutReparations'=>$coutReparations,
            'coutPolices'=>$coutPolices,
            'coutVisites'=>$coutVisites,
            'coutMaintenances'=>$coutMaintenances,
            'coutTotal'=>($coutMaintenances+$coutVisites+$coutPolices+  $coutReparations)
            );

    }

     /**
     * Edits an existing Produit entity.
     *@Rest\View(serializerGroups={"full"})
     */
    public function updateVehiculeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AppBundle:Vehicule')->find($request->get('id'));
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Vehicule entity.');
        }
        $form = $this->createCreateForm($entity);
        $form->submit($request->request->all(), false); // Validation des données

        if ($form->isValid()) {
            $em->flush();
          $releve = $em->getRepository('AppBundle:Releve')->findLastByVehicule($entity);
          $couts=$this->couts($request->get('id'));
          $entity->setLastReleve($releve);
          $entity->setCouts($couts);
           return $entity;
        }

        return  $form;
    }

    /**
     * Creates a form to create a Produit entity.
     * @param Produit $entity The entity
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Vehicule $entity)
    {
        $form = $this->createForm(VehiculeType::class, $entity);
        return $form;
    }
     /**
     * Edits an existing Produit entity.
     *@Rest\View()
     */
    public function deleteVehiculeAction(Request $request)
    {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Vehicule')->find($request->get('id'));
            if ($entity) {
            $em->remove($entity);
            $em->flush();
        }
       return ['success'=>true];
    }

    private function getConnectedUser(){
    return $this->get('security.token_storage')->getToken()->getUser();
}    
}
