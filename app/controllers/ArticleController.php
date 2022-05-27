<?php

namespace App\Controllers;

class ArticleController extends Controller{

    
    public function allArticles()
    {
        return $this->view("front.article.index");
    } 
    
    public function article(int $id)
    {
        return $this->view("front.article.readArticle", compact('id'));
    }
       
}