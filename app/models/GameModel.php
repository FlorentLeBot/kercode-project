<?php

namespace App\Models;

use Database\DBConnection;

class GameModel extends Model
{
    protected $table = 'board_games';

    public function getCategories(): array
    {
        return $this->query("SELECT c.* FROM categories c
                            INNER JOIN board_game_category bgc ON bgc.category_id = c.id
                            WHERE bgc.board_game_id = ?
                            ", [$this->id]);
    }
}
