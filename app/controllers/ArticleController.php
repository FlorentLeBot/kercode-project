<?php

namespace App\Controllers;

use App\Models\ArticleModel;

// Héritage 
class ArticleController extends Controller{

    // Tous les articles 
    public function articles()
    {
        $articles =  (new ArticleModel($this->db))->all();
        return $this->view("front.article.index", compact("articles"));
    }  
    // Un article
    public function article(int $id)
    {     
        $article = (new ArticleModel($this->db))->find($id); 
        return $this->view("front.article.readArticle", compact('article', 'ta'));
    }
       
}