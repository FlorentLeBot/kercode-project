<?php

namespace App\Controllers;

class ArticleController extends Controller{

    // Tous les articles 
    public function articles()
    {
        return $this->view("front.article.index");
    } 
    
    // Un article
    public function article(int $id)
    {
        return $this->view("front.article.readArticle", compact('id'));
    }
       
}