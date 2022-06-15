<?php

namespace App\Controllers;

use App\Models\TagModel;

class TagController extends Controller
{
    // récupération des tags
    public function tag(int $id)
    {
        $tag = (new TagModel($this->db))->find($id);
        return $this->view('front.article.tag', compact('tag'));
    }
}