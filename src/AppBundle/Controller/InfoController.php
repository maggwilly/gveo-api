<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Info;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations as Rest; // alias pour toutes les annotations
use FOS\RestBundle\View\View; 
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
        foreach ($infos as $key => $info) {
            foreach ($info->getRegistrations() as $key => $registration) {
                 if(!$registration->getIsFake()){
                  $url="https://trainings-fa73e.firebaseio.com/users/".$info->getUid()."/registrationsId/.json";
                  $data = array($registration->getRegistrationId() => true);
                  $fmc_response= $this->get('fmc_manager')->sendOrGetData($url,$data,'PATCH');           
              }
            }

        }
 
        return $this->render('AppBundle:info:index.html.twig', array(
            'infos' => $infos,
        ));
    }

        /**
     * Lists all Produit entities.
     *@Rest\View(serializerGroups={"info"})
     */
    public function editPictureAction(Request $request,  $email)
    {  $em = $this->getDoctrine()->getManager();
        $info = $em->getRepository('AdminBundle:Info')->findOneByUid($email);
          if($info==null){
          $info = new Info($email);
           $em->persist($info);
            $em->flush();
          }
        $form = $this->createForm('Pwm\AdminBundle\Form\InfoType', $info);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();       
       if( $info->upload()){
         $cloudinaryWrapper=$this ->container-> get('misteio_cloudinary_wrapper');
          $results= $cloudinaryWrapper-> upload($info->getPath(), '_user_'.$info->getUid(),array(), array("crop" => "limit","width" => "150", "height" => "150"))->getResult();
          $info->setPhotoURL($results['url']);
          $em->flush();
          $info->remove();
       }'
       '
          return $this->showJsonAction($info);
        }
        return $form;
    }




    /**
     * Lists all Produit entities.
     *@Rest\View(serializerGroups={"info"})
     */
    public function editJsonAction(Request $request, Info $info)
    {
        $form = $this->createForm('AppBundle\Form\InfoType', $info);
         $form->submit($request->request->all(),false);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
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
    public function showJsonAction(Request $request,$uid){
         $em = $this->getDoctrine()->getManager();
         $url= "https://trainings-fa73e.firebaseio.com/users/".$uid.".json";
         $res = $this->get('fmc_manager')->sendOrGetData($url,null,'GET');        
         $info = $em->getRepository('AdminBundle:Info')->findOneByUid($uid);
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
        return $info->getEmail()!=null?$info:$res;
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
     * Lists all Produit entities.
     *@Rest\View()
     */
    public function createRegistrationAction(Request $request, Registration $registration=null)
    {  
          $em = $this->getDoctrine()->getManager();
           if(!is_null($registration))
              return $this->editRegistrationJsonAction($request,$registration);
            $registration = new Registration();
            $form = $this->createForm('AppBundle\Form\RegistrationType', $registration);
            $form->submit($request->request->all(),false);
          if ($form->isValid()) {
              $registration ->setUserAgent($request->headers->get('User-Agent'));
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
    public function editRegistrationJsonAction(Request $request,Registration $registration)
    {
               $form = $this->createForm('AppBundle\Form\RegistrationType', $registration);
               $form->submit($request->request->all(),false);
              if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $registration
               ->setLatLoginDate(new \DateTime())
               ->setIsFake(null)
               ->setUserAgent($request->headers->get('User-Agent'));                
                 $em->flush();
                return array('success'=>true);
                  }
            return $form;
    }

        public function showAbonnementAction(Info $info){
        $em = $this->getDoctrine()->getManager();
         $abonnement = $em->getRepository('AdminBundle:Abonnement')->findMeOnThis($info);
        return $abonnement;
    }
}