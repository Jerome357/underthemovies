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
 * @Route("/quote")
 */
class QuoteController extends AbstractController
{
    /**
     * @Route("/", name="quote_index", methods={"GET"})
     */
    public function index(QuoteRepository $QuoteRepository): Response
    {
        return $this->render('quote/index.html.twig', [
            'quotes' => $QuoteRepository->findAll(),
        ]);
    }


    /**
     * @Route("/", name="quote_show", methods={"GET"})
     */
    public function show(Quote $quote): Response
    {
        return $this->render('quote/show.html.twig', [
            'quote' => $quote,
        ]);
    }
}