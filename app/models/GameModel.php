<?php

namespace App\models;

use Database\DBConnection;

/* SOMMAIRE :

- getCategories
- update
- create

*/

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

    public function updateGame(int $id, array $categories) : bool
    {
        $path = $this->upload($_FILES);
        $title = htmlspecialchars($_POST['title']);
        $content = htmlspecialchars($_POST['content']);

        // supprimer les catégories actuels
        $stmt = $this->db->prepare("DELETE FROM board_game_category WHERE board_game_id = ?");
        $res = $stmt->execute([$id]);

        // réinsertion des données
        foreach ($categories as $categoryId) {
            $stmt = $this->db->prepare("INSERT board_game_category (board_game_id, category_id) VALUES (?, ?)");
            $stmt->execute([$id, htmlspecialchars($categoryId)]);
        }

        parent::update([
            "id" => $id,
            "title" => $title,
            "content" => $content,
            "img" => $path
        ]);

        if ($res) {
            return true;
        }
    }

    public function create(array $data, ?array $tags = null, ?array $categories = null) : bool
    {
        $path = $this->upload($_FILES);
        $title = htmlspecialchars($_POST['title']);
        $content = htmlspecialchars($_POST['content']);

        parent::create([
            "title" => $title,
            "content" => $content,
            "img" => $path
        ]);

        $id = $this->db->lastInsertId();

        foreach ($categories as $categoryId) {
            $stmt = $this->db->prepare("INSERT board_game_category (board_game_id, category_id) VALUES (?, ?)");
            $stmt->execute([$id, htmlspecialchars($categoryId)]);
        }
        return true;
    }
}
