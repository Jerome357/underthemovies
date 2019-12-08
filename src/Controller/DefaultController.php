<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Entity\MoviePersonage;
use App\Entity\Personage;
use App\Entity\Quote;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage()
    {
        return $this->render('default/homepage.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    public function Quote()
    {
        $quotes = $this->getDoctrine()->getRepository(Quote::class)->findAll();

        return $this->render("default/_quote.html.twig", [
            "quotes" => $quotes
        ]);
    }

/*   public function Films()
    {
        $movie = $this->getDoctrine()->getRepository(Movie::class)->findAll();

        return $this->render("movie/index.html.twig", [
            "movie" => $movie
        ]);
    }*/
}
