<?php

namespace App\Form;

use App\Entity\CompteBanquaire;
use App\Entity\Utilisateur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompteBanquaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('IBAN')
            ->add('BIC')
            ->add('balance')
            ->add('id_compte_fourni')
            ->add('utilisateur', UtilisateurType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CompteBanquaire::class,
        ]);
    }
}
