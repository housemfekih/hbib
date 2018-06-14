<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;


class ChampType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        

        ->add('nomChamp', TextType::class, array(
            'label' => "Nom de champ : ",
            'attr' => ['class' => 'form-control'],
            'label_attr' => ['class' => 'form-control-label']


        ))
        
        ->add('typeChamp', ChoiceType::class, array(
            'choices'  => array(
                'String' => "text",
                'Number' => "number",
                'file' => "File",
                'date' => "date",
                'TextArea' => 'textarea'
            ),
    
        'label' => "Type du champ : ",
        'attr' => ['class' => 'form-control'],
        'label_attr' => ['class' => 'form-control-label']
        ))
   //     ->add('typeChamp', TextType::class, array(
     //       'label' => "Type de champ : ",
       //     'attr' => ['class' => 'form-control'],
          //  'label_attr' => ['class' => 'form-control-label']


    //    ))

    ->add('longeurChamp', IntegerType::class, array('attr' => array(
        'min' => '1',
        'max' => '20',
        'class' => 'form-control',
    )))
      //  ->add('longeurChamp', TextType::class, array(
        //    'label' => "Longeur du champ : ",
        //    'attr' => ['class' => 'form-control'],
         //   'label_attr' => ['class' => 'form-control-label']


       // ))

      ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Champ'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_champ';
    }


}
