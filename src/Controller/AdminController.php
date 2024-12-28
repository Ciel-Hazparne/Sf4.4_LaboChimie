<?php

namespace App\Controller;

use App\Entity\ProduitChimique;
use App\Form\ProduitType;
use App\Repository\ProduitChimiqueRepository;
use App\Service\Produit\ProduitService;
use Cocur\Slugify\Slugify;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin", name="admin")
 */
class AdminController extends AbstractController
{
    /**
     * @Route ("/produit/new/",name="new_produit")
     * @param EntityManagerInterface $manager
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function create(EntityManagerInterface $manager, Request $request)
    {
        $produit = new ProduitChimique();
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);
//        dd($form);
        if ($form->isSubmitted() && $form->isValid()) {
            $slugify = new Slugify;
            $produit->setDateCommande(new DateTime);
            $produit->setSlug($slugify->slugify($produit->getFormule()));
            $manager->persist($produit);
            $manager->flush();

            $this->addFlash(
                "success",
                "Votre produit a été ajouté"
            );
            return $this->redirectToRoute("show_produits");
        }


        return $this->render("produit/new.html.twig", [
            "form" => $form->createView(),
        ]);
    }


    /**
     * Permet de supprimer un produit
     * @Route ("/produit/delete/{id}", name="delete_produit")
     * @param ProduitChimique $produit
     * @param ProduitService $produitService
     * @return RedirectResponse
     */
    public function delete(ProduitChimique $produit, ProduitService $produitService): RedirectResponse
    {
        $produitService->remove($produit);

        return $this->redirectToRoute("show_produits");
    }

    /**
     * Permet de modifier un produit
     * @Route ("/produit/{slug}/edit", name="edit_produit")
     * @param ProduitChimique $produit
     * @param EntityManagerInterface $manager
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function edit(ProduitChimique $produit, EntityManagerInterface $manager, Request $request)
    {

        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($produit);
            $manager->flush();
            $this->addFlash(
                "success",
                "Produit chimique modifié"
            );
            return $this->redirectToRoute("show_produits");
        }

        return $this->render("produit/edit.html.twig", [
            "produit" => $produit,
            "form" => $form->createView()
        ]);
    }

    /**
     * Permet de voir le panier
     * @Route ("/panier",name="panier")
     * @param SessionInterface $session
     * @param ProduitChimiqueRepository $repo
     * @return Response
     */
    public function panier(SessionInterface $session,ProduitChimiqueRepository $repo): Response
    {
        $panier = $session->get('panier', []);
        // dd($panier);
        $panierWithData=[];
        foreach ($panier as $id=>$quantity) {
            $panierWithData[] = [
                'produit' => $repo->find($id),
                'quantity' => $quantity
            ];
        }
        //dd($panierWithData);
        return $this->render("produit/panier.html.twig",[
            'produits'=>$panierWithData
        ]);
    }

    /**
     * Permet d'ajouter un produit au panier
     * @Route ("/panier/produit/{id}",name="add_panier")
     * @param $id
     * @param SessionInterface $session
     * @return Response
     */
    public function add($id, SessionInterface $session): Response
    {


        $panier = $session->get('panier', []);
        if (!empty($panier[$id])) {
            $panier[$id]++;
        } else {
            $panier[$id] = 1;
        }

        $session->set('panier', $panier);
        //dd($session->get('panier'));
        return $this->redirectToRoute("adminpanier");
    }

    /**
     * Permet de supprimer un element du panier
     * @Route ("/panier/delete/{id}", name="delete_panier")
     * @param $id
     * @param SessionInterface $session
     * @return RedirectResponse
     */
    public function remove($id, SessionInterface $session): RedirectResponse
    {
        $panier = $session->get('panier', []);
        if (!empty($panier[$id])){
            unset($panier[$id]);
        }
        $session->set('panier',$panier);

        return $this->redirectToRoute("adminpanier");
    }

}
