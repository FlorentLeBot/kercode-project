<?php

namespace App\Controllers\Admin;

use App\Models\GameModel;
use App\models\ArticleModel;
use App\Controllers\Controller;

/* Sommaire des méthodes:
- article
- game
*/

class AdminController extends Controller
{
    /* LES VUES */

    // -----------------------------------------------------------------------------------------------------

    // affichage de la page article - administration des articles
    public function article(): void
    { 
        $articles = (new ArticleModel($this->db))->all();
        $this->viewAdmin('admin.dashboard.article', compact('articles'));
    }

    // affichage de la page game - administration des fiches pour les jeux de société
    public function game(): void
    {
        $games = (new GameModel($this->db))->all();
        $this->viewAdmin('admin.dashboard.game', compact('games'));
    }
}