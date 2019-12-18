<?php

namespace App\Controller;

use App\Entity\Personage;
use App\Repository\PersonageRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/personage")
 */
class PersonageController extends AbstractController
{
    /**
     * @Route("/personage/{id}", name="personage", methods={"GET"})
     */
    public function personage(Personage $personage): Response
    {
        return $this->render('personage/personage.html.twig', [
            'personage' => $personage
        ]);
    }
}

