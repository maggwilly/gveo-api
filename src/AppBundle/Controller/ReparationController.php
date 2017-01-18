<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Releve;
use AppBundle\Entity\Reparation;
use AppBundle\Entity\Maintenance;
use AppBundle\Entity\Police;
use AppBundle\Entity\Visite;
use AppBundle\Entity\InfoInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations as Rest; // alias pour toutes les annotations
/**
 * Reparation controller.
 *
 */
class ReparationController extends Controller
{
    /**
     * Creates a new Produit entity.
     *@Rest\View(serializerGroups={"full"})
     */
    public function reparationsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $reparations = $em->getRepository('AppBundle:Reparation')->findByVehicule($request->get('idV'),$request->get('idO'));

        return  $reparations;
      
    }


    /**
     * Creates a new Produit entity.
     *@Rest\View()
     */
    public function coutsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

       return $this->couts($request,$em);
      
    }



     public function couts(Request $request, $em)
    {
        $coutReparations = $em->getRepository('AppBundle:Reparation')->findCoutTotal($request->get('idV'),$request->get('annee'));
        $coutPolices = $em->getRepository('AppBundle:Police')->findCoutTotal($request->get('idV'),$request->get('annee'));
        $coutVisites = $em->getRepository('AppBundle:Visite')->findCoutTotal($request->get('idV'),$request->get('annee'));
        $coutMaintenances = $em->getRepository('AppBundle:Maintenance')->findCoutTotal($request->get('idV'),$request->get('annee'));
        return  array(
        	'coutReparations'=>$coutReparations,
        	'coutPolices'=>$coutPolices,
        	'coutVisites'=>$coutVisites,
        	'coutMaintenances'=>$coutMaintenances,
        	'coutTotal'=>($coutMaintenances+$coutVisites+$coutPolices+  $coutReparations)
        	);

    }

        /**
     * Creates a new Produit entity.
     *@Rest\View(serializerGroups={"full"})
     */
    public function lastReparationAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $reparation = $em->getRepository('AppBundle:Reparation')->findLastByVehicule($request->get('idV'),$request->get('idO'));

        return  $reparation;
      
    }

            /**
     * Creates a new Produit entity.
     *@Rest\View(serializerGroups={"full"})
     */
    public function lastPoliceAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $police = $em->getRepository('AppBundle:Police')->findLastByVehicule($request->get('idV'));

        return  $police;
      
    }

                /**
     * Creates a new Produit entity.
     *@Rest\View(serializerGroups={"full"})
     */
    public function lastVisiteAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $visite = $em->getRepository('AppBundle:Visite')->findLastByVehicule($request->get('idV'));

        return  $visite;
      
    }

                    /**
     * Creates a new Produit entity.
     *@Rest\View(serializerGroups={"full"})
     */
    public function lastReleveAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $releve = $em->getRepository('AppBundle:Releve')->findLastByVehicule($request->get('idV'));

        return  ['releve'=> $releve, 'couts'=>$this->couts($request,$em)];
      
    }
    /**
     * Creates a new Produit entity.
     *@Rest\View(serializerGroups={"full"})
     */
    public function maintenancesAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $maintenances = $em->getRepository('AppBundle:Maintenance')->findByVehicule($request->get('idV'),$request->get('idS'));

        return  $maintenances;
      
    }


    /**
     * Creates a new Produit entity.
     *@Rest\View(serializerGroups={"full"})
     */
    public function createReparationAction(Request $request)
    {
        $entity = new Reparation();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        $form->submit($request->request->all(),false); // Validation des d
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
           return $entity;
        }
        return  $form;
    }

       /**
     * Creates a new Produit entity.
     *@Rest\View(serializerGroups={"full"})
     */
    public function createMaintenanceAction(Request $request)
    {
        $entity = new Maintenance();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        $form->submit($request->request->all(),false); // Validation des d
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
           return $entity;
        }
        return  $form;
    } 

           /**
     * Creates a new Produit entity.
     *@Rest\View(serializerGroups={"full"})
     */
    public function createPoliceAction(Request $request)
    {
        $entity = new Police();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        $form->submit($request->request->all(),false); // Validation des d
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
           return $entity;
        }
        return  $form;
    }

           /**
     * Creates a new Produit entity.
     *@Rest\View(serializerGroups={"full"})
     */
    public function createVisiteAction(Request $request)
    {
        $entity = new Visite();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        $form->submit($request->request->all(),false); // Validation des d
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
           return $entity;
        }
        return  $form;
    }

               /**
     * Creates a new Produit entity.
     *@Rest\View(serializerGroups={"full"})
     */
    public function createReleveAction(Request $request)
    {
        $entity = new Releve();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        $form->submit($request->request->all(),false); // Validation des d
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
         return  $entity;
        }
        return  $form;
    }


     /**
     * Edits an existing Produit entity.
     *@Rest\View(serializerGroups={"full"})
     */
    public function updateReparationAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AppBundle:Reparation')->find($request->get('id'));
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Reparation entity.');
        }
        $form = $this->createCreateForm($entity);
        $form->submit($request->request->all(), false); // Validation des données

        if ($form->isValid()) {
            $em->flush();
           return $entity;
        }

        return  $form;
    }

     /**
     * Edits an existing Produit entity.
     *@Rest\View(serializerGroups={"full"})
     */
    public function updateMaintenanceAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AppBundle:Maintenance')->find($request->get('id'));
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Maintenance entity.');
        }
        $form = $this->createCreateForm($entity);
        $form->submit($request->request->all(), false); // Validation des données

        if ($form->isValid()) {
            $em->flush();
           return $entity;
        }

        return  $form;
    }

     /**
     * Edits an existing Produit entity.
     *@Rest\View(serializerGroups={"full"})
     */
    public function updatePoliceAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AppBundle:Police')->find($request->get('id'));
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Police entity.');
        }
        $form = $this->createCreateForm($entity);
        $form->submit($request->request->all(), false); // Validation des données

        if ($form->isValid()) {
            $em->flush();
           return $entity;
        }

        return  $form;
    }

     /**
     * Edits an existing Produit entity.
     *@Rest\View(serializerGroups={"full"})
     */
    public function updateVisiteAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AppBundle:Visite')->find($request->get('id'));
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Visite entity.');
        }
        $form = $this->createCreateForm($entity);
        $form->submit($request->request->all(), false); // Validation des données

        if ($form->isValid()) {
            $em->flush();
           return $entity;
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

      /**
     * Edits an existing Produit entity.
     *@Rest\View()
     */
    public function deleteReparationAction(Request $request)
    {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Reparation')->find($request->get('id'));
            if ($entity) {
            $em->remove($entity);
            $em->flush();
        }
       return ['success'=>true];
    }
      /**
     * Edits an existing Produit entity.
     *@Rest\View()
     */
    public function deleteMaintenanceAction(Request $request)
    {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Maintenance')->find($request->get('id'));
            if ($entity) {
            $em->remove($entity);
            $em->flush();
        }
       return ['success'=>true];
    }

      /**
     * Edits an existing Produit entity.
     *@Rest\View()
     */
    public function deletePoliceAction(Request $request)
    {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Police')->find($request->get('id'));
            if ($entity) {
            $em->remove($entity);
            $em->flush();
        }
       return ['success'=>true];
    }
      /**
     * Edits an existing Produit entity.
     *@Rest\View()
     */
    public function deleteVisiteAction(Request $request)
    {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Visite')->find($request->get('id'));
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
