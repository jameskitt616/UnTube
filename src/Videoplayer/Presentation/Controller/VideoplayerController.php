<?php

declare(strict_types=1);

namespace App\Videoplayer\Presentation\Controller;

use App\Api\Application\Service\YoutubeApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class VideoplayerController extends AbstractController
{
    private YoutubeApiService $youtubeApiService;

    public function __construct(YoutubeApiService $youtubeApiService)
    {
        $this->youtubeApiService = $youtubeApiService;
    }

    /**
     * @return Response
     * @Route("/watch", name="home")
     */
    public function show(): Response
    {
//        $video = $this->youtubeApiService->getVideoById($id);
        return $this->render('videoplayer/show.html.twig');
    }
}
