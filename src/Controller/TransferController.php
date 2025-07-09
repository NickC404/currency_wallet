<?php

namespace App\Controller;

use App\Repository\WalletRepository;
use App\Service\Wallet\WalletTransferService;
use Brick\Money\CurrencyConverter;
use Brick\Money\Exception\CurrencyConversionException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/transfer', methods: ['POST'])]
final class TransferController extends AbstractController
{
    public function __construct(
        private WalletTransferService $walletTransferService,
        private CurrencyConverter $currencyConverter,
    ) {
    }

    /**
     * @throws CurrencyConversionException
     */
    public function __invoke(Request $request, WalletRepository $walletRepository): Response
    {
        $fromWallet = $walletRepository->find($request['from_wallet_id']);
        $toWallet = $walletRepository->find($request['to_wallet_id']);
        $amount = $request['amount'];

        if ($fromWallet->getCurrency() !== $toWallet->getCurrency()) {
        }

        return $this->render('dashboard/index.html.twig');
    }
}
