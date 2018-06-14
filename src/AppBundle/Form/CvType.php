<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CvType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        
        ->add('nomCv')
        ->add('fichierCv', TextType::class, array(
            'label' => false,
            'attr' => ['class' => 'form-control dichCv'],
            'label_attr' => ['class' => 'form-control-label']


        ))
        ->add('contenuCv', TextType::class, array(
            'label' => false,
            'attr' => ['class' => 'form-control contCv'],
            'label_attr' => ['class' => 'form-control-label']


        ))

        ->add('templateID', EntityType::class, array(
			// looks for choices from this entity
			'class' => 'AppBundle:Template',

			// uses the User.username property as the visible option string
			'choice_label' => 'nomTemplate',

			// used to render a select box, check boxes or radios
			 'multiple' => false,
             'label' => false,
            'attr' => ['class' => 'form-control tmpl hidden',"style" => "display : none"],
            'label_attr' => ['class' => 'form-control-label'],
			'placeholder'=> "Choisir..."
        ))

        ->add('userID', EntityType::class, array(
			// looks for choices from this entity
			'class' => 'AppBundle:User',

			// uses the User.username property as the visible option string
			'choice_label' => 'username',

			// used to render a select box, check boxes or radios
			 'multiple' => false,
             'label' => false,
            'attr' => ['class' => 'form-control hidden',"style" => "display : none"],
            'label_attr' => ['class' => 'form-control-label'],
			'placeholder'=> "Choisir..."
        ))
        // ->add('templateID', EntityType::class, array(
		// 	// looks for choices from this entity
		// 	'class' => 'AppBundle:Template',

		// 	// uses the User.username property as the visible option string
		// 	'choice_label' => 'content',

		// 	// used to render a select box, check boxes or radios
		// 	 'multiple' => false,
        //      'label' => "Template : ",
        //     'attr' => ['class' => 'chosen-select form-control tmpl hidden'],
        //     'label_attr' => ['class' => 'form-control-label'],
		// 	'placeholder'=> "Choisir..."
        // ));
            ;
        
       // ->add('fichierCv')->add('contenuCv')->add('templateID')->add('userID');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Cv'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_cv';
    }


}
