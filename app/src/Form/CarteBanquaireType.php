<?php

namespace App\Form;

use App\Entity\CarteBanquaire;
use App\Form\CompteBanquaireType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarteBanquaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numero_carte')
            ->add('id_carte')
            ->add('statut')
            ->add('date_expiration',DateTimeType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'format' => 'yyyy-MM-dd',
                'property_path' => 'date_naissance',
            ])
            ->add('compteBanquaire', CompteBanquaireType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CarteBanquaire::class,
        ]);
    }
}
