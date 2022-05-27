<?php

namespace App\Models;

use PDO;
use Database\DBConnection;

abstract class Model
{

    protected $db;
    protected $table;

    public function __construct()
    {
        $this->db = DBConnection::getPDO();
    }

    public function all(): array
    {
        $req = $this->db->query("SELECT * FROM {$this->table} ORDER BY created_at DESC");
        $req->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
        return $req->fetchAll();
        // return $this->query("SELECT * FROM {$this->table} ORDER BY created_at DESC");
    }  

    public function find(int $id): Model
    {
        $req = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $req->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
        $req->execute([$id]);
        return $req->fetch();
    }
}