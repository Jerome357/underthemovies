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
    public function index()
    {
        return $this->render('default/homepage.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    public function Quote()
    {
        $quote = $this->getDoctrine()->getRepository(Quote::class)->findAll();
        $personage = $this->getDoctrine()->getRepository(Personage::class)->findAll();
        $user = $this->getDoctrine()->getRepository(User::class)->findAll();
        $movie = $this->getDoctrine()->getRepository(Movie::class)->findAll();


        return $this->render("default/_quote.html.twig",[
            "quote" => $quote,
            "personage" => $personage,
            "user" => $user,
            "movie" => $movie
        ]);
    }
}
