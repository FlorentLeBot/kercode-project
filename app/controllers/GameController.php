<?php

namespace App\Controllers;

use App\Models\GameModel;

class GameController extends Controller
{
    // affichage de toutes les fiches des jeux
    public function games()
    {
        $req = new GameModel;
        $games = $req->all();
        return $this->view('front.game.index', compact('games'));
    }
    
    // affichage d'une fiche
    public function game(int $id)
    {
        $req = new GameModel;
        $game = $req->find($id);
        return $this->view('front.game.readGame', compact('game'));
    }
}