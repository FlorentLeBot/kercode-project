<?php

namespace App\controllers;

class FrontController extends Controller
{
    public function legalNotice()
    {
        return $this->view('front.notice.legalNotice');
    }   

    public function gcu()
    {
        return $this->view('front.notice.gcu');
    }

    public function cookies()
    {
        return $this->view('front.notice.cookies');
    }
}