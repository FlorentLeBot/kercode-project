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

     // mise à jour d'un jeu 
     public function updateGame(int $id, array $categories = null): bool
     {
         $path = $this->upload($_FILES);
         $title = htmlspecialchars($_POST['title']);
         $content = htmlspecialchars($_POST['content']);
         $imgName = htmlspecialchars($_POST['img_name']);
 
         // supprimer les categories
         // sans la méthode query
         $req = $this->db->prepare("DELETE FROM board_game_category WHERE board_game_id = ?");
         $res = $req->execute([$id]);
 
         // réinsertion des données
         // avec la méthode query
         foreach ($categories as $categoryId) {
             $req = $this->query("INSERT INTO board_game_category (board_game_id, category_id) VALUES (?, ?)", [$id, htmlspecialchars($categoryId)], true);
         }
 
         parent::update([
             "id" => $id,
             "title" => $title,
             "content" => $content,
             "img" => $path,
             "img_name" => $imgName       
         ]);
 
         if ($res) {
             return true;
         }  
     }
     
     public function createGame(array $data, ?array $categories = null) : bool
     {
         $title = htmlspecialchars($_POST['title']);
         $content = htmlspecialchars($_POST['content']);
         $imgName = htmlspecialchars($_POST['img_name']);
         $path = $this->upload($_FILES);
 
         parent::create([
             "title" => $title,
             "content" => $content,
             "img" => $path,
             "img_name" => $imgName
         ]);
 
         $id = $this->db->lastInsertId();

         foreach ($categories as $categoryId) {
            $req = $this->db->prepare("INSERT INTO `board_game_category` (board_game_id, category_id) VALUES (?, ?)");
            // var_dump($req); die;
            $req->execute([$id, htmlspecialchars($categoryId)]);
            // var_dump($res); die;
        }

         return true;
     }
    
}
