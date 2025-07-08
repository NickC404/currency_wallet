<?php

namespace App\Service\Wallet;

use App\Entity\Wallet;
use Doctrine\ORM\EntityManagerInterface;

class WalletTransferService
{
    public function __construct(EntityManagerInterface $entityManager)
    {}

    public function transfer(Wallet $from, Wallet $to, string $amount): void
    {
        if ($from->getCurrency() !== $to->getCurrency()) {
            // convert
        }

    }
}
