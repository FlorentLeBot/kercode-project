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
}
