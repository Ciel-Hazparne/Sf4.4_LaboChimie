<?php

namespace App\Controller;

use App\Entity\ProduitChimique;
use App\Entity\Upload;
use App\Form\UploadType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin", name="admin")
 */

class ImportController extends AbstractController
{
    /**
     * @Route("/import", name="import")
     */
    public function xslx(Request $request, EntityManagerInterface $entityManager)
    {
        $upload=new Upload();
        $form=$this->createForm(UploadType::class,$upload);
        $form->handleRequest($request);

        if ($form->isSubmitted()&& $form->isValid()){
        $file = $form->get('file')->getData(); // get the file from the sent request


        $fileFolder = __DIR__ . '/../../public/';  //choose the folder in which the uploaded file will be stored

        $filePathName = md5(uniqid()) . $file->getClientOriginalName();

        // apply md5 function to generate an unique identifier for the file and concat it with the file extension
        try {
            $file->move($fileFolder, $filePathName);
        } catch (FileException $e) {
            dd($e);
        }
        $spreadsheet = IOFactory::load($fileFolder . $filePathName); // Here we are able to read from the excel file
        $row = $spreadsheet->getActiveSheet()->removeRow(1); // I added this to be able to remove the first file line
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true); // here, the read data is turned into an array
        //dd($sheetData);

        foreach ($sheetData as $Row) {

            $id = $Row['A']; // store the first_name on each iteration
            $quantite = $Row['B']; // store the last_name on each iteration

            $produit = $entityManager->getRepository(ProduitChimique::class)->find($id);
//            dd($produit);
            $produit->setQuantite($produit->getQuantite() + $quantite);
            // make sure that the user does not already exists in your db

            $entityManager->persist($produit);
            $entityManager->flush();

        }
        }
        return $this->render("import/index.html.twig",[
            'form' => $form->createView()
        ]);
    }
}
