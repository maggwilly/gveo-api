<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Vehicule;
use AppBundle\Form\VehiculeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations as Rest; // alias pour toutes les annotations
use AppBundle\Entity\Info;
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
    public function indexAction(Request $request)
    {
         $em = $this->getDoctrine()->getManager();
          $uid=$request->query->get('uid');   
          $registrationId=$request->query->get('registrationId');   
         $url= "https://trainings-fa73e.firebaseio.com/users/".$uid.".json";
         $res = $this->get('fmc_manager')->sendOrGetData($url,null,'GET');  
        
         $info = $em->getRepository('AppBundle:Info')->findOneByUid($uid);
         $registration = $em->getRepository('AppBundle:Registration')->findOneByRegistrationId($request->query->get('registrationId'));
           if(is_null($info)){
            $info = new Info($uid);
            $form = $this->createForm('AppBundle\Form\InfoType',$info);
            $form->submit($res,false);
            if (!$form->isValid())
                 return $form; 
                $em->persist($info); 
                 $em->flush(); 
              }
            if($registration!=null)
                $registration->setInfo($info);
            $em->flush();  
        $vehicules = $em->getRepository('AppBundle:Vehicule')->findByUser( $info);
        return  $vehicules;
    }
               /**
     * Creates a new Produit entity.
     *@Rest\View(serializerGroups={"full"})
     */
    public function createVehiculeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new Vehicule($em->getRepository('AppBundle:Info')->findOneByUid($request->headers->get('X-Auth-Token')));
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        $form->submit($request->request->all(),false); // Validation des d
        if ($form->isValid()) {  
            $em->persist($entity);
            $em->flush();
            $releve = $em->getRepository('AppBundle:Releve')->findLastByVehicule($entity);

            $entity->setLastReleve($releve);
           return $entity;
        }
        return  $form;
    }



     /**
     * Edits an existing Produit entity.
     *@Rest\View(serializerGroups={"full"})
     */
    public function updateVehiculeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AppBundle:Vehicule')->find($request->get('id'));
        $form = $this->createCreateForm($entity);
        $form->submit($request->request->all(), false); // Validation des données
        if ($form->isValid()) {
            $em->flush();
          $releve = $em->getRepository('AppBundle:Releve')->findLastByVehicule($entity);
          $entity->setLastReleve($releve);
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
