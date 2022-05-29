<?php

namespace App\Controllers;

use App\Models\ContactModel;

class ContactController extends Controller
{
    public function contact()
    {
        return $this->view('front.contact.formContact');
    }   
}