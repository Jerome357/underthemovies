<?php

namespace App\Controller;

use App\Entity\Quote;
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

        return $this->render("default/_quote.html.twig",[
            "quote" => $quote
        ]);
    }
}
