<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations as Rest; // alias pour toutes les annotations
use AppBundle\Form\CredentialsType;
use AppBundle\Entity\AuthToken;
use AppBundle\Entity\Credentials;
use AppBundle\Entity\User;

/**
 * CommandeClient controller.
 */
class AuthTokenController extends Controller
{
        /**
     * @Rest\View(statusCode=Response::HTTP_CREATED, serializerGroups={"full"})
     * 
     */
    public function postAuthTokensAction(Request $request)
    {
        $credentials = new Credentials();
        $form = $this->createForm( CredentialsType::class, $credentials);

        $form->submit($request->request->all());

        if (!$form->isValid()) {
            return $form;
        }
         $em = $this->getDoctrine()->getManager();
         $user = $em->getRepository('AppBundle:User')->findOneByEmail($credentials->getLogin());
        if (!$user) { // L'utilisateur n'existe pas encore
               $entity = new User();
               $entity->setEnabled(true)->setRoles(array('ROLE_USER'));
               $em->persist($entity);
           // return $this->invalidCredentials();
        }

     /*  $encoder = $this->get('security.password_encoder');
         $isPasswordValid = $encoder->isPasswordValid($user, $credentials->getPassword());
         if (!$isPasswordValid) { // Le mot de passe n'est pas correct
            return $this->invalidCredentials();
        }*/

        $authToken=AuthToken::create($user);
        $em->persist($authToken);
        $em->flush();
        return $authToken;
    }


    /**
     * @Rest\View()
      
     */
    public function removeAuthTokensAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
         $authToken = $em->getRepository('AppBundle:AuthToken')->findOneByValue($request->get('value'));
        if (!$authToken) {
            throw $this->createNotFoundException('Unable to find  $authToken entity.');
        }
            $em->remove($authToken);
            $em->flush();
       
        return ['success'=>true];
    }

    private function invalidCredentials()
    {
        return \FOS\RestBundle\View\View::create(['message' => 'Invalid credentials'], Response::HTTP_BAD_REQUEST);
    }
   private function getToken(){
    return $this->get('security.token_storage')->getToken();
} 
}