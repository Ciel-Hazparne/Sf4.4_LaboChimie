<?php

namespace App\Controller;

use App\Repository\MeasuresRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class HomePageController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(){

        return $this->render("home_page/index.html.twig");
    }


}
