<?php

namespace App\controllers;

use App\Models\HomeModel;

class HomeController extends Controller
{
    // affichage de la page d'accueil (les 3 derniers articles)
    public function home()
    {
        $article = new HomeModel;
        $articles = $article->getLasterArticles();
        return $this->view('home', compact('articles'));
    }
}
    