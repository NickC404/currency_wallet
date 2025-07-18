<?php

namespace App\Controller;

use App\Entity\Wallet;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $wallets = $entityManager->getRepository(Wallet::class)->findBy(['owner' => $this->getUser()]);

        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
            'wallets' => $wallets,
        ]);
    }
}
