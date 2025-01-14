<?php

namespace App\EventListener;

use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

class LoginListener
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event): void
    {
        // Get the User .
        $user = $event->getAuthenticationToken()->getUser();

        // Update the time.
        $user->setLastLogin(new DateTime());

        // Persist the data to database.
        $this->em->persist($user);
        $this->em->flush();
    }
}