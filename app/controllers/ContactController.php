<?php

namespace App\controllers;

use App\Models\ContactModel;

class ContactController extends Controller
{
    public function contact()
    {
        return $this->view('front.contact.formContact');
    }   

    function postMail()
    {
        $email = $_POST['email'];
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $postMail = (new ContactModel($this->db))->postMail($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['address'], $_POST['content']);
            return header('Location: /kercode-project/');
        }
    }
}