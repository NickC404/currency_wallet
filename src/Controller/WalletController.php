<?php

namespace App\Controller;

use App\Entity\Wallet;
use Brick\Money\Exception\UnknownCurrencyException;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class WalletController extends AbstractController
{
    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
    }

    /**
     * @throws UnknownCurrencyException
     */
    #[Route('/api/wallet/{id}/balance', name: 'get-wallet-balance', methods: ['GET'])]
    public function getBalance(int $id): JsonResponse
    {
        return $this->json([
            'value' => $this->entityManager->getRepository(Wallet::class)->find($id)->getMoneyFormatted(),
        ]);
    }
}
