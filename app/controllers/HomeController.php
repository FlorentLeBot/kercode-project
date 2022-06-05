<?php

namespace App\Controllers;

use App\Models\HomeModel;

class HomeController extends Controller
{
    // affichage de la page d'accueil (les 3 derniers articles)
    public function home()
    {
        $req = new HomeModel;
        $articles = $req->getLasterArticles();
        $games = $req->getLasterGames();
        $this->view('home', compact('games', 'articles'));
    }
}
    