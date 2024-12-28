<?php

namespace App\Controller;


use App\Entity\User;
use App\Form\AccountType;
use App\Form\UserType;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AccountController extends AbstractController
{

    /**
     * Permet de créer un compte utilisateur
     * @Route("/inscription", name="account_register")
     * @param EntityManagerInterface $manager
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @return Response
     */
    public function create(EntityManagerInterface $manager, Request $request, UserPasswordEncoderInterface $encoder): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
            $user->setValidate(false);
            $user->setLastLogin(new DateTime);
            $manager->persist($user);
            $manager->flush();

            $this->addFlash(
                'success',
                "Votre compte a bien été créée"
            );

            return $this->redirectToRoute("account_login");
        }
        return $this->render('account/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    /**
     * Permet de se connecter
     * @Route ("/login", name="account_login")
     * @param AuthenticationUtils $utils
     * @return Response
     */
    public function login(AuthenticationUtils $utils): Response
    {
        $error = $utils->getLastAuthenticationError();
        $user = $utils->getLastUsername();
        return $this->render("account/login.html.twig", [
            'haserror' => $error !== null,
            'username' => $user
        ]);
    }


    /**
     * Permet de se déconnecter
     * @Route ("/logout", name="account_logout")
     */
    public function logout(): void{

    }


//    /**
//     * Permet à l'utilisateur connecté de modifier son profil
//     * @Route("/account/profile", name="account_profile")
//     * @IsGranted ("ROLE_USER")
//     * @param Request $request
//     * @param EntityManagerInterface $manager
//     * @return RedirectResponse|Response
//     */
//    public function profile(Request $request, EntityManagerInterface $manager)
//    {
//        $user = $this->getUser();
//        $form = $this->createForm(AccountType::class, $user);
//        $form->handleRequest($request);
//        if ($form->isSubmitted() && $form->isValid()) {
//            $manager->persist($user);
//            $manager->flush();
//
//            $this->addFlash(
//                "success",
//                "Modification bien apporté"
//            );
//
//            return $this->redirectToRoute("account_profile");
//        }
//        return $this->render("account/profile.html.twig", [
//            'form' => $form->createView()
//        ]);
//    }

}
