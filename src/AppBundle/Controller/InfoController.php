<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Info;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations as Rest; // alias pour toutes les annotations
use FOS\RestBundle\View\View; 
use AppBundle\Entity\Abonnement;
use AppBundle\Entity\Registration;
/**
 * Info controller.
 *
 */
class InfoController extends Controller
{
    /**
     * Lists all info entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $infos = $em->getRepository('AppBundle:Info')->findAll();
       /* foreach ($infos as $key => $info) {
            foreach ($info->getRegistrations() as $key => $registration) {
                 if(!$registration->getIsFake()){
                  $url="https://trainings-fa73e.firebaseio.com/users/".$info->getUid()."/registrationsId/.json";
                  $data = array($registration->getRegistrationId() => true);
                  $fmc_response= $this->get('fmc_manager')->sendOrGetData($url,$data,'PATCH');           
              }
            }
        }*/
        return $this->render('AppBundle:info:index.html.twig', array(
            'infos' => $infos,
        ));
    }

       /**
     * Displays a form to edit an existing info entity.
     *
     */
    public function editAction(Request $request, Info $info)
    {
        $deleteForm = $this->createDeleteForm($info);
        $editForm = $this->createForm('AppBundle\Form\InfoType', $info);
        $editForm->handleRequest($request);
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('info_edit', array('uid' => $info->getUid()));
        }
        return $this->render('info/edit.html.twig', array(
            'info' => $info,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Lists all Produit entities.
     *@Rest\View(serializerGroups={"info"})
     */
    public function editJsonAction(Request $request, Info $info)
    {
         $em = $this->getDoctrine()->getManager();
        //  $info = $em->getRepository('AppBundle:Info')->findOneByUid($uid);
         //$info = $em->getRepository('AppBundle:Info')->findOneByUid($request->query->get('uid'));
         $form = $this->createForm('AppBundle\Form\InfoType', $info);
         $form->submit($request->request->all(),false);
        if ($form->isValid()) {
            $em->flush();
            return $info;
        }
        return $form;
    }


    /**
     * Lists all Produit entities.
     *@Rest\View(serializerGroups={"ambassador"})
     */
    public function getAmbassadorJsonAction( Info $info){

        return  $info->getAmbassador();
    }

    /**
     * Lists all Produit entities.
     *@Rest\View(serializerGroups={"info"})
     */
    public function showJsonAction(Request $request,$uid=null){
         $em = $this->getDoctrine()->getManager();
         $url= "https://geveo-d01fb.firebaseio.com/users/".$uid.".json";
         $res = $this->get('fmc_manager')->sendOrGetData($url,null,'GET');        
         $info = $em->getRepository('AppBundle:Info')->findOneByUid($uid);
         $registrationId=$request->query->get('registrationId');
         $registration = $em->getRepository('AppBundle:Registration')->findOneByRegistrationId($registrationId);
           if(is_null($info)){
            $info = new Info($uid);
            $form = $this->createForm('AppBundle\Form\InfoType',$info);
            $form->submit($res,false);
            if (!$form->isValid())
                 return $form; 
                $em->persist($info); 
                 $em->flush(); 
              }
        return $info;
    }

    
    /**
     * Finds and displays a info entity.
     *
     */
    public function showAction(Info $info)
    {
        $deleteForm = $this->createDeleteForm($info);
        return $this->render('AppBundle:info:show.html.twig', array(
            'info' => $info,
            'delete_form' => $deleteForm->createView(),
        ));
    }

 
    /**
     * Deletes a info entity.
     *
     */
    public function deleteAction(Request $request, Info $info)
    {
        $form = $this->createDeleteForm($info);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($info);
            $em->flush();
        }
        return $this->redirectToRoute('info_index');
    }

    /**
     * Creates a form to delete a info entity.
     *
     * @param Info $info The info entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Info $info)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('info_delete', array('id' => $info->getEmail())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     *Lists all Produit entities.
     *@Rest\View()
     */
    public function createRegistrationAction(Request $request)
    {  
          $em = $this->getDoctrine()->getManager();
            $registration = new Registration();
            $form = $this->createForm('AppBundle\Form\RegistrationType', $registration);
            $form->submit($request->request->all(),false);
    if ($form->isValid()) {
        $registration ->setUserAgent($request->headers->get('User-Agent'));
        if(is_null($em->getRepository('AppBundle:Registration')->findOneByRegistrationId($registration->getRegistrationId())))
              $em->persist($registration);
              $em->flush();
            return array('success'=>true);
          }

        return $form;
    }


     /**
     * Lists all Produit entities.
     *@Rest\View()
     */
    public function editRegistrationJsonAction(Request $request,$id=null)
    {
            $em = $this->getDoctrine()->getManager();
           $registration = $em->getRepository('AppBundle:Registration')->findOneByRegistrationId($request->query->get('id'));
            if(is_null($registration))
              return $this->createRegistrationAction($request);
               $form = $this->createForm('AppBundle\Form\RegistrationType', $registration);
               $form->submit($request->request->all(),false);
              if ($form->isValid()) {
                $registration->setLatLoginDate(new \DateTime())
               ->setIsFake(null)
               ->setUserAgent($request->headers->get('User-Agent'));                
                 $em->flush();
                return array('success'=>true);
                  }
            return $form;
    }


    /**
     * Lists all Produit entities.
     *@Rest\View(serializerGroups={"full"})
     */
        public function showAbonnementAction(Info $info){
        $em = $this->getDoctrine()->getManager();
        $abonnement = $em->getRepository('AppBundle:Abonnement')->findMeOnThis($info);
         if (is_null($abonnement)) {
            $abonnement=new Abonnement('STARTER');
            $abonnement->setInfo($info);
            $em->persist($abonnement);
            $em->flush();
              return  $abonnement;
         }
        return  $abonnement;
    }
}
