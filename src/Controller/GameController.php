<?php

namespace App\Controller;

use App\Entity\Game;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends AbstractController
{
    /**
     * @Route("/", name="Home")
     */
    public function index(): Response
    {
        return $this->render(
            'home/index.html.twig',
        );
    }
    /**
     * @Route("/home", name="home")
     */
    public function index2(): Response
    {
        return $this->render(
            'home/index.html.twig',
        );
    }
    /**
     * @Route("/game", name="game")
     */
    public function game(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Game::class);

        $games = $repo->findAll();

        //dd($games);

        return $this->render(
            'game/index.html.twig',
            [
                'games' => $games,
            ]
        );
    }
    /**
     * @Route("/show/{id}", name = "show")
     */
    public function show($id): Response
    {
        $repo = $this->getDoctrine()->getRepository(Game::class);

        $game = $repo->find($id);
        if (!$game) {
            return $this->redirectToRoute('home');
        }
        return $this->render(
            'show/index.html.twig',
            [
                'game' => $game,
            ]
        );
    }
}
