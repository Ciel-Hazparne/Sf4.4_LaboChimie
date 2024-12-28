<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * Permet d'afficher tous les utilisateurs
     * @Route("/user", name="user")
     * @IsGranted("ROLE_ADMIN")
     * @param UserRepository $repository
     * @return Response
     */
    public function index(UserRepository $repository): Response
    {
        $user=$repository->findAll();
        //dd($user);
        return $this->render('user/index.html.twig', [
            'users' => $user,
        ]);
    }


    /**
     * Permet de supprimer unn utilisateur
     * @Route("/account/delete/{id}", name="account_delete")
     * @IsGranted("ROLE_ADMIN")
     */
    public function delete(User $user, EntityManagerInterface $manager): \Symfony\Component\HttpFoundation\RedirectResponse
    {
//        dd($user);
        $manager->remove($user);
        $manager->flush();
        $this->addFlash(
            "success",
            "Le professeur ".$user->getPrenom()."".$user->getNom()." a été supprimé"
        );
        return $this->redirectToRoute("user");
    }
}
