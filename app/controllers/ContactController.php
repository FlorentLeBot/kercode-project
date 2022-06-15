<?php

namespace App\controllers;

use App\Models\ContactModel;

class ContactController extends Controller
{
    public function contact()
    {
        return $this->view('front.contact.formContact');
    }   

    // envoyer un email
    public function postMail()
    {
        $firstname = htmlentities($_POST['firstname']);
        $lastname = htmlentities($_POST['lastname']);
        $email = $_POST['email'];
        $address = htmlentities($_POST['address']);
        $content = htmlentities($_POST['content']);

          $data = [
            "firstname" => $firstname,
            "lastname" => $lastname,
            "email" => $email,
            "address" =>$address,
            "content" => $content      
          ];

        
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $postMail = (new ContactModel($this->db))->postMail($data);
            return header('Location: /kercode-project/');
        }
    }
}