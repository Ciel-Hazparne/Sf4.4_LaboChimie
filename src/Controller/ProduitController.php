<?php

namespace App\Controller;


use App\Entity\ProduitChimique;
use App\Repository\ProduitChimiqueRepository;

use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ProduitController extends AbstractController
{
    /**
     * Permet d'afficher tous les produits et de les paginer
     * @Route("/produit", name="show_produits")
     * @param ProduitChimiqueRepository $repo
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    public function show(ProduitChimiqueRepository $repo, PaginatorInterface $paginator, Request $request): Response
    {
        $produits = $paginator->paginate($repo->findAll(), $request->query->getInt('page', 1),12);

        return $this->render('produit/index.html.twig', [
            'produit' => $produits
        ]);
    }


    
    /**
     * Permet de voir le details d'un produit
     * @Route ("/produit/{slug}", name="show_details")
     * @param ProduitChimique $produit
     * @return Response
     */

    public function showDetails(ProduitChimique $produit): Response
    {
//        dd($produit);
        return $this->render("produit/details.html.twig", [
            "produit" => $produit
        ]);
    }


}
