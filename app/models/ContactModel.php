<?php

namespace App\Models;

use App\Models\Model;
use Database\DBConnection;

class ContactModel extends Model
{
    protected $table = 'contact';

    public function postMail(string $firstname, string $lastname, string $email, string $address, string $content): string
    {
        $firstname = htmlentities($_POST['firstname']);
        $lastname = htmlentities($_POST['lastname']);
        $email = htmlentities($_POST['email']);
        $address = htmlentities($_POST['address']);
        $content = htmlentities($_POST['content']);

        return $this->query("INSERT INTO {$this->table} ( `firstname`, `lastname`, `email`, `address`, `content`) VALUE(?, ?, ?, ?, ?)", [$firstname, $lastname, $email, $address, $content]);
    }

    public function getMail() : mixed
    {
        return $this->query("SELECT `id`, `firstname`, `lastname`, `email`, `address`, `content` FROM {$this->table}");   
    }
}

        

        

        
    