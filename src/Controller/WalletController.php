<?php

namespace App\Controller;

use App\Entity\Wallet;
use App\Form\WalletFormType;
use Brick\Money\Exception\UnknownCurrencyException;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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

    #[Route('/api/wallet/add', name: 'add-wallet', methods: ['GET', 'POST'])]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $wallet = new Wallet();
        $form = $this->createForm(WalletFormType::class, $wallet);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $wallet->setOwner($this->getUser());
            $wallet->setAmount(0);
            $entityManager->persist($wallet);
            $entityManager->flush();

            return $this->redirectToRoute('app_dashboard');
        }

        return $this->render('wallet/add.html.twig', [
            'walletForm' => $form,
        ]);
    }
}
