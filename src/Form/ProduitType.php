<?php

namespace App\Form;

use App\Entity\ProduitChimique;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('formule')
            ->add('name')
            ->add('masse_molaire')
            ->add('concentration_molaire')
            ->add('concentration_massique')
            ->add('masse')
            ->add('volume')
            ->add('duree_conservation')
            ->add('quantite')
            ->add('fournisseur')

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ProduitChimique::class,
        ]);
    }
}
