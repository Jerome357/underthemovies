<?php

namespace App\Controller;

use App\Entity\Quote;
use App\Repository\QuoteRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/quotes")
 */
class QuotesController extends AbstractController
{
    /**
     * @Route("/quotes", name="quotes", methods={"GET"})
     */
    public function quotes(QuoteRepository $QuoteRepository): Response
    {
        return $this->render('quote/index.html.twig', [
            'quotes' => $QuoteRepository->findAll(),
        ]);
    }
}