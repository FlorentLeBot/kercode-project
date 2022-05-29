<?php

namespace App\Models;

use Database\DBConnection;

class CategoryModel extends Model
{
    protected $table = 'categories';

    public function getGames() : array
    {
        return $this->query("SELECT bg.* FROM board_games bg
        INNER JOIN board_game_category bgc ON bgc.board_game_id = bg.id
        WHERE bgc.category_id = ?", [$this->id]);    
    }
}