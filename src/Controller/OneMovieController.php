<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Repository\MovieRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/movie")
 */
class OneMovieController extends AbstractController
{
    /**
     * @Route("/movie/{id}", name="movie", methods={"GET"})
     */
    public function onemovie(Movie $movie): Response
    {
        return $this->render('movie/onemovie.html.twig', [
            'movie' => $movie,
        ]);
    }
}

