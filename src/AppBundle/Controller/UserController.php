<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest; // alias pour toutes les annotations
use FOS\RestBundle\View\View; // Utilisation de la vue de FOSRestBundle
use AppBundle\Entity\User;
use AppBundle\Entity\AuthToken;
use AppBundle\Form\UserType;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use FOS\RestBundle\Controller\Annotations\Version;
use AppBundle\Entity\Registration;
/**
 * User controller.
 *
 */
class UserController extends Controller
{

    /**
     * Lists all User entities.
     * @Rest\View(serializerGroups={"user"})
     */
    public function indexAction(Request $request)
    {
           $user = $this->getConnectedUser();
         if (! $user) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }
        $em = $this->getDoctrine()->getManager();

       return $em->getRepository('AppBundle:User')->findByOrgan($user->getOrgan());
  
    }
    /** Creates a new User entity.
     *@Rest\View(statusCode=Response::HTTP_CREATED,serializerGroups={"full"})
     */
    public function createAction(Request $request)
    {

        $entity = new User();

        $form = $this->createCreateForm($entity,['validation_groups'=>['Default', 'New']]);
        $form->submit($request->request->all(),false); // Validation des données
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
             $encoder = $this->get('security.password_encoder');
            // le mot de passe en claire est encodé avant la sauvegarde
            $encoded = $encoder->encodePassword($entity, $entity->getPlainPassword());
            $entity->setPassword($encoded)->setEnabled(true)->setRoles(array('ROLE_USER'));
            $authToken=AuthToken::create($entity);
            $em->persist($entity);
            $em->persist($authToken);
            $em->flush();
           return $authToken
           ;
        }

        return  $form;
    }

    /**
     * Creates a form to create a User entity.
     *
     * @param User $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(User $entity,$options=array())
    {
        $form = $this->createForm(UserType::class, $entity, $options);

        return $form;
    }

    /**
     * Displays a form to create a new User entity.
     *
     */
    public function newAction()
    {
        $entity = new User();
        $form   = $this->createCreateForm($entity);

        return $this->render('AppBundle:User:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a User entity.
     *@Rest\View(serializerGroups={"user"})
     */
    public function showUserAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $this->getConnectedUser();

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }


       return $entity;
    }

    /**
     * Displays a form to edit an existing User entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:User:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }



    /**
     * Edits an existing User entity.
     *@Rest\View(serializerGroups={"user"})
     */
    public function updateUserAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
          $entity = $this->getConnectedUser();
       
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }
        $form = $this->createCreateForm($entity,['validation_groups'=>['Default', 'update']]);
        $form->submit($request->request->all(), false); // Validation des données

        if ($form->isValid()) {
            $em->flush();

           return ['success'=>true,'data'=>$entity];
        }

        return  $form;
    }


    /**
     * Edits an existing User entity.
     *@Rest\View(serializerGroups={"user"})
     *@Security("has_role('ROLE_USER')")
     */
    public function chagePasswordAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

         $entity = $this->getConnectedUser();

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }
        $form = $this->createCreateForm($entity,['validation_groups'=>['Default', 'new']]);
        $form->submit($request->request->all(), false); // Validation des données

        if ($form->isValid()) {
            $encoder = $this->get('security.password_encoder');
            // le mot de passe en claire est encodé avant la sauvegarde
            $encoded = $encoder->encodePassword($entity, $entity->getPlainPassword());
            $entity->setPassword($encoded);
            $em->persist($entity);
            $em->flush();

           return ['success'=>true,'data'=>$entity];
        }

        return  $form;
    }

    /**
     * Deletes a User entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:User')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find User entity.');
            }
            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('user'));
    }


    /**
     * Creates a form to delete a User entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    private function getConnectedUser(){
    return $this->get('security.token_storage')->getToken()->getUser();
}


}
