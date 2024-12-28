<?php

namespace App\Controller;

use App\Repository\MeasuresRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class MeasuresController extends AbstractController
{
    /**
     * Permet d'afficher les mesures de la salle de cours
     * @Route("/classroom", name="classroom_mesure")
     * @param ChartBuilderInterface $chartBuilder
     * @param MeasuresRepository $measuresRepository
     * @return Response
     */
    public function index3(ChartBuilderInterface $chartBuilder, MeasuresRepository $measuresRepository): Response
    {

        //recherche les mesures

        $tempResults = $measuresRepository->findByLibelle("temperatureQt");
        $humResults = $measuresRepository->findByLibelle("humiditeQt");
        $c02Results = $measuresRepository->findByLibelle("co2Qt");
        $covResults = $measuresRepository->findByLibelle("covQt");
        //dd($tempResults);
        $labels_temp = [];
        $data_temp = [];
        $labels_hum = [];
        $data_hum = [];
        $labels_c02 = [];
        $data_c02 = [];
        $labels_cov = [];
        $data_cov = [];

        //        pour la temperature
        foreach ($tempResults as $tempResult) {
            $labels_temp[] = $tempResult->getCreatedAt()->format('H:i');
            $data_temp[] = $tempResult->getValeur();
        }
        $chart_temp = $chartBuilder->createChart(Chart::TYPE_LINE);
        $chart_temp->setData([
            'labels' => $labels_temp,
            'datasets' => [
                [
                    'label' => 'Température de la salle de chimie',
//                    'backgroundColor' => 'rgb(80, 133, 228 )',
                    'borderColor' => 'rgb(80, 133, 228 )',
                    'data' => $data_temp,
                ],
            ],

        ]);

        //        pour l'humidite

        foreach ($humResults as $humResult) {
            $labels_hum[] = $humResult->getCreatedAt()->format('H:i');
            $data_hum[] = $humResult->getValeur();
        }
        $chart_hum = $chartBuilder->createChart(Chart::TYPE_LINE);
        $chart_hum->setData([
            'labels' => $labels_hum,
            'datasets' => [
                [
                    'label' => 'humidite de la salle de chimie',
//                    'backgroundColor' => 'rgb(54, 193, 61 ',
                    'borderColor' => 'rgb(54, 193, 61',
                    'data' => $data_hum,
                ],
            ],

        ]);

        //        pour la c02

        foreach ($c02Results as $c02Result) {
            $labels_c02[] = $c02Result->getCreatedAt()->format('H:i');
            $data_c02[] = $c02Result->getValeur();
        }
        $chart_c02 = $chartBuilder->createChart(Chart::TYPE_LINE);
        $chart_c02->setData([
            'labels' => $labels_c02,
            'datasets' => [
                [
                    'label' => 'c02 de la salle de chimie',
//                    'backgroundColor' => 'rgb(218, 0, 10 )',
                    'borderColor' => 'rgb(218, 0, 10 )',
                    'data' => $data_c02,
                ],
            ],

        ]);



        foreach ($covResults as $covResult) {
            $labels_cov[] = $covResult->getCreatedAt()->format('H:i');
            $data_cov[] = $covResult->getValeur();
        }
        $chart_cov = $chartBuilder->createChart(Chart::TYPE_LINE);
        $chart_cov->setData([
            'labels' => $labels_cov,
            'datasets' => [
                [
                    'label' => 'cov de la salle de chimie',
//                    'backgroundColor' => 'rgb(162, 161, 150  ',
                    'borderColor' => 'rgb(235, 219, 25 )',
                    'data' => $data_cov,
                ],
            ],

        ]);


        $chart_temp->setOptions([
            'scales' => [
                'yAxes' => [
                    ['ticks' => ['min' => 0]],
                ],
            ],
        ]);
        $chart_hum->setOptions([
            'scales' => [
                'yAxes' => [
                    ['ticks' => ['min' => 0]],
                ],
            ],
        ]);
        $chart_c02->setOptions([
            'scales' => [
                'yAxes' => [
                    ['ticks' => ['min' => 0]],
                ],
            ],
        ]);

        $chart_cov->setOptions([
            'scales' => [
                'yAxes' => [
                    ['ticks' => ['min' => 0]],
                ],
            ],
        ]);


        return $this->render("measures/classroom.html.twig", [
            'chart' => $chart_temp,
            'chart2' => $chart_hum,
            'chart3' => $chart_c02,
            'chart6' => $chart_cov,
        ]);
    }

    /**
     * Permet d'afficher les mesures du labo
     * @Route("/labo", name="labo_mesure")
     * @param ChartBuilderInterface $chartBuilder
     * @param MeasuresRepository $measuresRepository
     * @return Response
     */
    public function index2(ChartBuilderInterface $chartBuilder, MeasuresRepository $measuresRepository): Response
    {

        //recherche les mesures

        $tempResults = $measuresRepository->findByLibelle("temperature");
        $humResults = $measuresRepository->findByLibelle("humidite");
        $c02Results = $measuresRepository->findByLibelle("co2");
        $luxResults = $measuresRepository->findByLibelle("luminosite");
        $covResults = $measuresRepository->findByLibelle("cov");
        //dd($tempResults);
        $labels_temp = [];
        $data_temp = [];
        $labels_hum = [];
        $data_hum = [];
        $labels_c02 = [];
        $data_c02 = [];
        $labels_lux = [];
        $data_lux = [];
        $labels_cov = [];
        $data_cov = [];

        //        pour la temperature
        foreach ($tempResults as $tempResult) {
            $labels_temp[] = $tempResult->getCreatedAt()->format('H:i');
            $data_temp[] = $tempResult->getValeur();
        }
        $chart_temp = $chartBuilder->createChart(Chart::TYPE_LINE);
        $chart_temp->setData([
            'labels' => $labels_temp,
            'datasets' => [
                [
                    'label' => 'Température de la salle de chimie',
//                    'backgroundColor' => 'rgb(80, 133, 228 )',
                    'borderColor' => 'rgb(80, 133, 228 )',
                    'data' => $data_temp,
                ],
            ],

        ]);

        //        pour l'humidite

        foreach ($humResults as $humResult) {
            $labels_hum[] = $humResult->getCreatedAt()->format('H:i');
            $data_hum[] = $humResult->getValeur();
        }
        $chart_hum = $chartBuilder->createChart(Chart::TYPE_LINE);
        $chart_hum->setData([
            'labels' => $labels_hum,
            'datasets' => [
                [
                    'label' => 'humidite de la salle de chimie',
//                    'backgroundColor' => 'rgb(54, 193, 61 ',
                    'borderColor' => 'rgb(54, 193, 61',
                    'data' => $data_hum,
                ],
            ],

        ]);

        //        pour la c02

        foreach ($c02Results as $c02Result) {
            $labels_c02[] = $c02Result->getCreatedAt()->format('H:i');
            $data_c02[] = $c02Result->getValeur();
        }
        $chart_c02 = $chartBuilder->createChart(Chart::TYPE_LINE);
        $chart_c02->setData([
            'labels' => $labels_c02,
            'datasets' => [
                [
                    'label' => 'c02 de la salle de chimie',
//                    'backgroundColor' => 'rgb(218, 0, 10 )',
                    'borderColor' => 'rgb(218, 0, 10 )',
                    'data' => $data_c02,
                ],
            ],

        ]);



        //        pour la luminosité
        foreach ($luxResults as $luxResult) {
            $labels_lux[] = $luxResult->getCreatedAt()->format('H:i');
            $data_lux[] = $luxResult->getValeur();
        }
        $chart_lux = $chartBuilder->createChart(Chart::TYPE_LINE);
        $chart_lux->setData([
            'labels' => $labels_lux,
            'datasets' => [
                [
                    'label' => 'Luminosite de la salle de chimie',
//                    'backgroundColor' => 'rgb(162, 161, 150  ',
                    'borderColor' => 'rgb(235, 219, 25 )',
                    'data' => $data_lux,
                ],
            ],

        ]);

        foreach ($covResults as $covResult) {
            $labels_cov[] = $covResult->getCreatedAt()->format('H:i');
            $data_cov[] = $covResult->getValeur();
        }
        $chart_cov = $chartBuilder->createChart(Chart::TYPE_LINE);
        $chart_cov->setData([
            'labels' => $labels_cov,
            'datasets' => [
                [
                    'label' => 'cov de la salle de chimie',
//                    'backgroundColor' => 'rgb(162, 161, 150  ',
                    'borderColor' => 'rgb(235, 219, 25 )',
                    'data' => $data_cov,
                ],
            ],

        ]);


        $chart_temp->setOptions([
            'scales' => [
                'yAxes' => [
                    ['ticks' => ['min' => 0]],
                ],
            ],
        ]);
        $chart_hum->setOptions([
            'scales' => [
                'yAxes' => [
                    ['ticks' => ['min' => 0]],
                ],
            ],
        ]);
        $chart_c02->setOptions([
            'scales' => [
                'yAxes' => [
                    ['ticks' => ['min' => 0]],
                ],
            ],
        ]);

        $chart_cov->setOptions([
            'scales' => [
                'yAxes' => [
                    ['ticks' => ['min' => 0]],
                ],
            ],
        ]);


        return $this->render("measures/labo.html.twig", [
            'chart_temp' => $chart_temp,
            'chart_hum' => $chart_hum,
            'chart_co2' => $chart_c02,
            'chart_lux' => $chart_lux,
            'chart_cov' => $chart_cov,
        ]);
    }
}
