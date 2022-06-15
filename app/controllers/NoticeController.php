<?php

namespace App\controllers;

// affichage des mentions légale ...
class NoticeController extends Controller
{
    public function legalNotice()
    {
        return $this->view('front.notice.legalNotice');
    }   

    public function termsOfService()
    {
        return $this->view('front.notice.termsOfService');
    }

    public function cookies()
    {
        return $this->view('front.notice.cookies');
    }
}