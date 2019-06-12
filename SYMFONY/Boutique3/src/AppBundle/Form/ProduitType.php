<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

use Symfony\Component\Validator\Constraints as Assert;

class ProduitType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('reference', TextType::class, array(
            'required' => false, 
            'constraints' => array(
                new Assert\NotBlank(array(
                    'message' => 'Attention, veuillez renseigner ce champs !'
                )),
                new Assert\Length(array(
                    'min' => 3,
                    'minMessage' => 'Attention, veuillez renseignerau minimum 3 caractères',
                    'max' => 20,
                    'maxMessage' => 'Attention, veuillez renseignerau maximmum 20 caractères'
                )),
                new Assert\Regex(array(
                    'pattern' => '/^[a-zA-Z-_0-9]+$/',
                    'message' => 'Veuillez utiliser les lettres de A à Z et les chiffres de 0 à 9'
                 ))
            )
        ))
        ->add('categorie', TextType::class, array(
            'required' => false, 
            'constraints' => array()
        ))
        ->add('titre', TextType::class, array(
            'required' => false, 
            'constraints' => array()
        ))
        ->add('description', TextareaType::class, array(
            'required' => false, 
            'constraints' => array()
        ))
        ->add('couleur', TextType::class, array(
            'required' => false, 
            'constraints' => array()
        ))

        ->add('taille', ChoiceType::class, array(
            'choices' => array(
                'XS' => 'xs',
                'S' => 's',
                'M' => 'm',
                'L' => 'l',
                'XL' => 'xl',
                '2XL' => '2xl'
            )
        ))

        ->add('public', ChoiceType::class, array(
            'choices' => array(
                'Homme' => 'm',
                'Femme' => 'f',
                'Homme et Femme' => 'mixte'
            )
        ))
        ->add('file', FileType::class, array(
            'required' => false,
        ))
        ->add('prix', MoneyType::class)
        ->add('stock', IntegerType::class, array(
            'required' => false, 
            'constraints' => array(
                new Assert\Type(array(
                    'type' => 'integer',
                    'message' => 'Veuillez renseigner un chiffre'
                ))
            ), 
            'attr' => array(
                'placeholder' => 'Ex : 125',
                'class' => 'form-control'
            )
        ))
        ->add('Enregistrer', SubmitType::class);

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Produit'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_produit';
    }


}
