<?php

namespace App\Controllers;

use App\Models\GameModel;

class GameController extends Controller
{
    // affichage de toutes les fiches des jeux
    public function games()
    {
        $game = new GameModel;
        $games = $game->all();
        return $this->view('front.game.index', compact('games'));
    }
    
    // affichage d'un jeu
    public function game(int $id)
    {
        $oneGame = new GameModel;
        $game = $oneGame->find($id);
        return $this->view('front.game.readGame', compact('game'));
    }
}