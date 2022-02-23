<?php

declare(strict_types=1);

namespace App\Home\Presentation\Controller;

use App\Api\Application\Service\YoutubeApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class HomeController extends AbstractController
{
    private YoutubeApiService $youtubeApiService;

    public function __construct(YoutubeApiService $youtubeApiService)
    {
        $this->youtubeApiService = $youtubeApiService;
    }

    /**
     * @return Response
     * @Route("/", name="home")
     */
    public function show(): Response
    {
        return $this->render('home/show.html.twig');
    }
}
