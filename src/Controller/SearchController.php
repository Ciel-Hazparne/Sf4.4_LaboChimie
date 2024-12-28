<?php

namespace App\Controller;

use Elastica\Util;
use FOS\ElasticaBundle\Finder\TransformedFinder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search")
     * @param Request $request
     * @param SessionInterface $session
     * @param TransformedFinder $produitsFinder
     * @return Response
     */
    public function search(Request $request, SessionInterface $session, TransformedFinder $produitsFinder): Response
    {
        $q = (string)$request->query->get('q', '');
        $results = !empty($q) ? $produitsFinder->findHybrid(Util::escapeTerm($q)) : [];
        $session->set('q', $q);
//dd($results);
        return $this->render('search/index.html.twig', compact('results', 'q'));
    }
}
