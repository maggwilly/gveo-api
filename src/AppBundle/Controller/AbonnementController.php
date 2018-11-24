<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Abonnement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

/**
 * Abonnement controller.
 *
 */
class AbonnementController extends Controller
{
    /**
     * Lists all abonnement entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $abonnements = $em->getRepository('AppBundle:Abonnement')->findAll();
        return $this->render('AppBundle:abonnement:index.html.twig', array(
            'abonnements' => $abonnements,
        ));
    }

    /**
     * Creates a new abonnement entity.
     *
     */
    public function newAction(Request $request)
    {
        $abonnement = new Abonnement();
        $form = $this->createForm('AppBundle\Form\AbonnementType', $abonnement);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($abonnement);
            $em->flush();
            return $this->redirectToRoute('abonnement_show', array('id' => $abonnement->getId()));
        }
        return $this->render('abonnement/new.html.twig', array(
            'abonnement' => $abonnement,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a abonnement entity.
     *
     */
    public function showAction(Abonnement $abonnement)
    {
        $deleteForm = $this->createDeleteForm($abonnement);
        return $this->render('abonnement/show.html.twig', array(
            'abonnement' => $abonnement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing abonnement entity.
     *
     */
    public function renouvellerAction(Request $request, Abonnement $abonnement)
    {
        $editForm = $this->createFormBuilder($abonnement)
              ->add('plan',ChoiceType::class,
               array('label'=>"Type d'abonnement",
               'choices'  => array(
                    'STARTER' => 'STARTER',
                    'STANDARD' => 'STANDARD', 
                    'ENTERPRISE' => 'ENTERPRISE')))
                    ->add('nbervehicule','number', array('label'=>"Nombre de vehicules"))
              ->getForm();        
              $editForm->handleRequest($request);
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $endDate=new \DateTime();
            $startDate=new \DateTime();
            switch ($abonnement->getPlan()) {
                case 'STARTER':
                  $this->endDate->modify('+30 day');
                    break;
                case 'STANDARD':
                      $this->endDate->modify('+1 year');
                    break;               
                default:
                     $this->endDate->modify('+1 year');
                    break;
            }
            $abonnement->setEndDate($endDate)->setStartDate($startDate);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('abonnement_index', array('id' => $abonnement->getId()));
        }

        return $this->render('AppBundle:abonnement:edit.html.twig', array(
            'abonnement' => $abonnement,
            'edit_form' => $editForm->createView()
        ));
    }

    public function toggleAction(Request $request, Abonnement $abonnement)
    {
        $editForm = $this->createFormBuilder($abonnement)
              ->add('status',ChoiceType::class,
               array('label'=>"Choisir",
               'choices'  => array(
                    'ACTIVE' => 'INACTIVE',
                    'INACTIVE' => 'INACTIVE')))
              ->getForm();        
              $editForm->handleRequest($request);
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('abonnement_index', array('id' => $abonnement->getId()));
        }
        return $this->render('AppBundle:abonnement:toggle.html.twig', array(
            'abonnement' => $abonnement,
            'edit_form' => $editForm->createView()
        ));
    }   
   
    /**
     * Deletes a abonnement entity.
     *
     */
    public function deleteAction(Request $request, Abonnement $abonnement)
    {
        $form = $this->createDeleteForm($abonnement);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($abonnement);
            $em->flush();
        }
        return $this->redirectToRoute('abonnement_index');
    }

    /**
     * Creates a form to delete a abonnement entity.
     *
     * @param Abonnement $abonnement The abonnement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Abonnement $abonnement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('abonnement_delete', array('id' => $abonnement->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
