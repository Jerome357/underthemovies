<?php

namespace App\Controller;

use App\Entity\Person;
use App\Repository\PersonRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/person")
 */
class PersonController extends AbstractController
{
    /**
     * @Route("/person/{id}", name="person", methods={"GET"})
     */
    public function person(Person $person): Response
    {
        return $this->render('person/person.html.twig', [
            'person' => $person
        ]);
    }
}