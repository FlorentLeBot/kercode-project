<?php

namespace App\Models;

use App\Models\Model;
use Database\DBConnection;

class ContactModel extends Model
{
    protected $table = 'contact';

    public function postMail($data)
    {     
        $data = array(
            ":firstname" => $data['firstname'],
            ":lastname" => $data['lastname'],
            ":email" => $data['email'],
            ":address" =>$data['address'],
            ":content" =>$data['content']       
        );

        return $this->query("INSERT INTO {$this->table} ( `firstname`, `lastname`, `email`, `address`, `content`) VALUES(:firstname, :lastname, :email, :address, :content)", $data);
    }

    public function getMail() : mixed
    {
        return $this->query("SELECT `id`, `firstname`, `lastname`, `email`, `address`, `content` FROM {$this->table}");   
    }
}

        

        

        
    