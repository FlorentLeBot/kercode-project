<?php

namespace App\controllers;

use App\Models\CategoryModel;

class CategoryController extends Controller
{
    public function category(int $id)
    {
        $category = (new CategoryModel($this->db))->find($id);
        return $this->view('front.game.category', compact('category'));
    }  
}