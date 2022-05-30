<?php

namespace App\controllers;

use App\Models\ArticleModel;


// Héritage 
class ArticleController extends Controller{

    // Tous les articles 
    public function articles()
    {
        $article = new ArticleModel;
        $articles = $article->all();
    
        return $this->view("front.article.index", compact("articles"));
    } 
    
    // Un article
    public function article(int $id)
    {     
        $article = new ArticleModel;
        $article = $article->find($id);
       
        return $this->view("front.article.readArticle", compact('article'));
    }
       
}