<?php

namespace App\Models;

use Database\DBConnection;

class HomeModel extends Model {

    public function getLasterArticles(){
        return $this->query("SELECT `id`, `title`, `content`, `img`, `created_at` FROM `articles` ORDER BY `created_at` DESC LIMIT 3");
    }
}