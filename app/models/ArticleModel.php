<?php

namespace App\models;

use Database\DBConnection;

class ArticleModel extends Model
{
    protected $table = 'articles';

    // récupération des tags 
    public function getTags(): array
    {
        return $this->query("SELECT t.* FROM tags t
                            INNER JOIN article_tag art ON art.tag_id = t.id
                            WHERE art.article_id = ?
                            ", [$this->id]);
    }

    // mise à jour d'un article du blog
    public function updateArticle(int $id, array $tags = null): bool
    {
        $path = $this->upload($_FILES);
        $title = htmlspecialchars($_POST['title']);
        $content = htmlspecialchars($_POST['content']);
        $imgName = htmlspecialchars($_POST['img_name']);

        // supprimer les tags actuels
        $req = $this->db->prepare("DELETE FROM article_tag WHERE article_id = ?");
        $res = $req->execute([$id]);

        // réinsertion des données
        foreach ($tags as $tagId) {
            $req = $this->query("INSERT INTO article_tag (article_id, tag_id) VALUES (?, ?)", [$id, htmlspecialchars($tagId)], true);
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
    public function createArticle(array $data, array $tags) : bool
    {
        $path = $this->upload($_FILES);
        $title = htmlspecialchars($_POST['title']);
        $content = htmlspecialchars($_POST['content']);
        $imgName = htmlspecialchars($_POST['img_name']);

        parent::create([
            "title" => $title,
            "content" => $content,
            "img" => $path,
            "img_name" => $imgName
        ]);

        $id = $this->db->lastInsertId();

        foreach ($tags as $tagId) {
            $req = $this->db->prepare("INSERT INTO article_tag (article_id, tag_id) VALUES (?, ?)");
            $req->execute([$id, htmlspecialchars($tagId)]);
        }
        return true;
    }
}