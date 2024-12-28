<?php

namespace App\Service\Produit;

use App\Entity\ProduitChimique;
use App\Form\ProduitType;
use Cocur\Slugify\Slugify;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ProduitService extends AbstractController
{

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    private $Request;

    public function __construct(EntityManagerInterface $manager)
    {

        $this->entityManager = $manager;

    }

    public function create()
    {
        $produit = new ProduitChimique();
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($this->Request);
        if ($form->isSubmitted() && $form->isValid()) {
            $slugify = new Slugify;
            $produit->setDateCommande(new DateTime);
            $produit->setSlug($slugify->slugify($produit->getFormule()));
            $this->entityManager->persist($produit);
            $this->entityManager->flush();

            $this->addFlash(
                "success",
                "Votre produit a été ajouté"
            );
            return $this->redirectToRoute("show_produits");
        }
    }

    public function remove(ProduitChimique $produit){
        $this->entityManager->remove($produit);
        $this->entityManager->flush();

        $this->addFlash(
            "success",
            "Produit chimique supprimé avec succes"
        );
    }
}

