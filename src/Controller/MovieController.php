<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Repository\QuoteRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/movie")
 */
class QuoteController extends AbstractController
{
    /**
     * @Route("/movie", name="movie", methods={"GET"})
     */
    public function movie(QuoteRepository $QuoteRepository): Response
    {
        return $this->render('quote/movie.html.twig', [
            'movie' => $QuoteRepository->findAll(),
        ]);
    }
}