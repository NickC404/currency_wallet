<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CurrencyController extends AbstractController
{
    #[Route('/currency/types', name: 'get-types', methods: ['GET'])]
    public function getTypes(): Response
    {
        return $this->json();
    }
}
