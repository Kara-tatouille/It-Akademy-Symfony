<?php

namespace App\Controller;

use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(ContactRepository $contactRepository)
    {
        return $this->render('home/index.html.twig', [
            'contacts' => $contactRepository->findAll(),
        ]);
    }
}
