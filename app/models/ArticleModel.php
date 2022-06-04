<?php

namespace App\models;

use Database\DBConnection;

class ArticleModel extends Model
{
    protected $table = 'articles';

    // récupération des tags 
    public function getTags() : array
    {
        return $this->query("SELECT t.* FROM tags t
                            INNER JOIN article_tag art ON art.tag_id = t.id
                            WHERE art.article_id = ?
                            ", [$this->id]);
    }  
    
    // mise à jour d'un article du blog
    public function updateArticle(int $id, array $tags) : bool
    {
        $title = htmlspecialchars($_POST['title']);
        $content = htmlspecialchars($_POST['content']);

        // supprimer les tags actuels
        $stmt = $this->db->prepare("DELETE FROM article_tag WHERE article_id = ?");
        $res = $stmt->execute([$id]);

        // réinsertion des données
        foreach ($tags as $tagId) {
            $stmt = $this->query("INSERT article_tag (article_id, tag_id) VALUES (?, ?)", [$id, htmlspecialchars($tagId)], true);
        
        }

        parent::update([
            "id" => $id,
            "title" => $title,
            "content" => $content,
                
        ]);

        if ($res) {
            return true;
        }
    }

}
