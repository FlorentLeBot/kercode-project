<?php

namespace App\Models;

use PDO;
use DateTime;
use Database\DBConnection;

/* Sommaire des méthodes:
- all
- find
- getCreatedAt
- getExcerpt
*/

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

    public function getCreatedAt(): string
    {
        // création d'un nouvelle instance DateTime avec comme paramètre mes created_at 
        // retourne une chaîne de caractère
        // puis je la formate
        return $date = (new DateTime($this->created_at))->format('d/m/Y à H:i');
    }

    public function getExcerptContent(): string
    {
        // mb_substr retourne un segnement de la chaîne de caractère
        // paramètre la chaîne de caractère, le début de la chaîne et sa fin
        return mb_substr($this->content, 0, 120) . ' ...';
    }

    public function getExcerptTitle(): string
    {
        $str = $this->title;
        if(strlen($str) < 30){
            return mb_substr($str, 0, 30);
        }else{
            return mb_substr($str, 0, 30) . ' ...';
        }   
    }
}