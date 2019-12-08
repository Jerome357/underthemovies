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
 * @Route("/indexfilms")
 */
class IndexController extends AbstractController
{
    /**
     * @Route("/index", name="indexfilms", methods={"GET"})
     */

    public function index()
    {
        $indexfilms = $this->getDoctrine()->getRepository(Movie::class)->findAll();

        return $this->render("index/index.html.twig", [
            "indexfilms" => $indexfilms
        ]);
    }
}