<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
class MatiereEditType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titre')
                ->add('description')->add('poids')->add('otherRessourcesLink')
                 ->add('auMoinsdeMemeQue',
                  EntityType::class, array(
                     'class' => 'AppBundle:Matiere' ,
                     'choice_label' => 'titre',
                      'label'=>'Le même contenu que', 'empty_data' => null,
                      'group_by' => function($val, $key, $index) {
                            return $val->getProgramme()->getNom();
                           }
                  ))
;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Matiere'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_matiere';
    }


}