<?php

namespace App\Controllers;

class ArticleController{

    public function index(int $id)
    {
        echo "Je suis l'article " . $id;
    }     
       
}