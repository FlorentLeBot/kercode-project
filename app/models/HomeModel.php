<?php

namespace App\models;

use Database\DBConnection;

class HomeModel extends Model {

    // récupération des 3 derniers articles
    public function getLasterArticles()
    {
        return $this->query("SELECT `id`, `title`, `content`, `img`, `created_at` FROM `articles` ORDER BY `created_at` DESC LIMIT 3");
    }

    // récupération des 3 derniers jeux
    public function getLasterGames()
    {
        return $this->query("SELECT `id`, `title`, `content`, `img`, `created_at` FROM `board_games` ORDER BY `created_at` DESC LIMIT 3");
    }
}