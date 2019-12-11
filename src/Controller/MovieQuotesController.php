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
 * @Route("/movieQuotes")
 */
class MovieQuotesController extends AbstractController
{
    /**
     * @Route("/moviequote/{id}", name="movieQuotes", methods={"GET"})
     */
    public function movieQuote(Quote $quote): Response
    {
        return $this->render('movie/movieQuotes.html.twig', [
            'quote' => $quote,
        ]);
    }
}


