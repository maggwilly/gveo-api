<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Releve;
use AppBundle\Entity\Reparation;
use AppBundle\Entity\Maintenance;
use AppBundle\Entity\Police;
use AppBundle\Entity\Visite;
use AppBundle\Entity\InfoInterface;
use AppBundle\Entity\Vehicule;
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

        $reparations = $em->getRepository('AppBundle:Reparation')->findByVehicule($request->get('vehicule'),$request->get('operation'));

        return  $reparations;
      
    }


    /**
     * Creates a new Produit entity.
     *@Rest\View()
     */
    public function coutsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $startDate=new \Datetime(date('Y').'-01-01');
        $endDate=new \Datetime(date('Y').'-12-31');
        $periode=$request->get('periode');
       switch ($periode) {
           case 'lastmonth':
            $startDate->modify('first day of last month');
            $endDate->modify('last day of last month');
               break;
           case 'lastyear':
               $startDate->modify('first day of last year');
               $endDate->modify('last day of last year');
               break;
           case 'thismonth':
                $startDate->modify('first day of this month');
                $endDate->modify('last day of this  month');
               break; 
           case 'thisyear':
                $startDate->modify('first day of this year');
                $endDate->modify('last day of this  year');
               break;                                         
           default:
                $startDate=\DateTime::createFromFormat('d/m/Y', $request->get('startdate'));
                $endDate=\DateTime::createFromFormat('d/m/Y', $request->get('enddate'));
               break;
       }
       return $this->couts($request->get('uid'),$request->get('vehicule'), $startDate, $endDate);
      
    }





        /**
     * Creates a new Produit entity.
     *@Rest\View(serializerGroups={"full"})
     */
    public function lastReparationAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $reparation = $em->getRepository('AppBundle:Reparation')
        ->findLastByVehicule($request->get('vehicule'),$request->get('operation'));

        return  $reparation;
      
    }

        /**
     * Creates a new Produit entity.
     *@Rest\View(serializerGroups={"full"})
     */
    public function todosAction(Request $request)
    {
        $vehicule=$request->get('vehicule');
        return   $this->todos($vehicule);
    }

        /**
     * Creates a new Produit entity.
     *@Rest\View(serializerGroups={"full"})
     */
    public function isTodosAction(Request $request)
    {
        $uid=$request->query->get('uid'); 
         $em = $this->getDoctrine()->getManager();
        $info = $em->getRepository('AppBundle:Info')->findOneByUid($uid);
        $vehicules = $em->getRepository('AppBundle:Vehicule')->findByUser( $info);
        foreach ( $vehicules as $key => $vehicule) {
            if(!empty($this->todos($vehicule)))
                return true;
        }
        return   false;
    }

       /**
     * Creates a new Produit entity.
     *@Rest\View(serializerGroups={"full"})
     */
    public function needControlAction(Request $request)
    {
        $uid=$request->query->get('uid'); 
         $em = $this->getDoctrine()->getManager();
        $info = $em->getRepository('AppBundle:Info')->findOneByUid($uid);
        $vehicules = $em->getRepository('AppBundle:Vehicule')->findByUser( $info);
        foreach ( $vehicules as $key => $vehicule) {
             $visite = $em->getRepository('AppBundle:Visite')->findLastByVehicule($vehicule);
            if(is_null($visite)||$visite->isExpired())
                return true;
             $police = $em->getRepository('AppBundle:Police')->findLastByVehicule($vehicule);
            if(is_null($police)||$police->isExpired())
                return true;
        }
        return   false;
    }



    public function todos($vehicule)
    {
        $todos=array();
        $em = $this->getDoctrine()->getManager();
        $operations = $em->getRepository('AppBundle:Operation')->findAll();
        foreach ($operations as $key => $operation) {
            $reparation = $em->getRepository('AppBundle:Reparation')
        ->findLastByVehicule($vehicule,$operation);
        if(is_null($reparation))
            $todos[]=$operation->setTodo('Vérifier et renseigner');
         elseif($reparation->isExpired()) {
             $todos[]=$operation->setTodo('Contrôler et remplacer');
         }
        }
        return   $todos;
    }

            /**
     * Creates a new Produit entity.
     *@Rest\View(serializerGroups={"full"})
     */
    public function lastPoliceAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $police = $em->getRepository('AppBundle:Police')->findLastByVehicule($request->get('vehicule'));

        return  $police;
      
    }

                /**
     * Creates a new Produit entity.
     *@Rest\View(serializerGroups={"full"})
     */
    public function lastVisiteAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $visite = $em->getRepository('AppBundle:Visite')->findLastByVehicule($request->get('vehicule'));

        return  $visite;
      
    }

                    /**
     * Creates a new Produit entity.
     *@Rest\View(serializerGroups={"full"})
     */
    public function lastReleveAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $releve = $em->getRepository('AppBundle:Releve')->findLastByVehicule($request->get('vehicule'));
        return  $releve;
    }

    public function couts($uid,$entity, \Datetime $startDate,\Datetime $endDate)
    {    $em = $this->getDoctrine()->getManager();
        $coutReparations = $em->getRepository('AppBundle:Reparation')->findCoutTotal($uid,$entity, $startDate,$endDate);
        $coutPolices = $em->getRepository('AppBundle:Police')->findCoutTotal($uid,$entity, $startDate,$endDate);
        $coutVisites = $em->getRepository('AppBundle:Visite')->findCoutTotal($uid,$entity, $startDate,$endDate);
        $coutMaintenances = $em->getRepository('AppBundle:Maintenance')->findCoutTotal($uid,$entity, $startDate,$endDate);
        $last = $em->getRepository('AppBundle:Releve')->findLastByVehicule($entity);
        $first = $em->getRepository('AppBundle:Releve')->findFirstByVehicule($entity);
        $totalkm=0;
        if(!is_null($last)&&!is_null( $first))
           $totalkm=($last->getKm()-$first->getKm());
        return  array(
            'preventive'=>($coutReparations+0),
            'legislation'=>($coutVisites+$coutPolices),
            'cuirative'=>($coutMaintenances+0),
           'totalkm'=> $totalkm,
            'coutTotal'=>($coutMaintenances+$coutVisites+$coutPolices+  $coutReparations)
            );
    }


    /**
     * Creates a new Produit entity.
     *@Rest\View(serializerGroups={"full"})
     */
    public function maintenancesAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $maintenances = $em->getRepository('AppBundle:Maintenance')->findByVehicule($request->get('vehicule'),$request->get('systeme'));
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
         return $entity;
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
