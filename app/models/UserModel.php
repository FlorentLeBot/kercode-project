<?php

namespace App\Models;

class UserModel extends Model
{
    protected $table = 'users';

    public function getConnection(string $username) : UserModel
    {
        return $this->query("SELECT * FROM {$this->table} 
                              WHERE `username` = ? ", [$username], true);          
    }
}