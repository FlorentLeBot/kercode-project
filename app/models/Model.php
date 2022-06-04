<?php

namespace App\models;

use PDO;
use DateTime;
use Database\DBConnection;

/* Sommaire des méthodes:
- all
- find
- getCreatedAt
- getExcerptContent
- getExcerptTitle
*/

abstract class Model
{
    protected $db;
    protected $table;

    public function __construct()
    {
        $this->db = DBConnection::getPDO();
    }

    // méthode permettant de faire des rêquetes de manière dynamique
    public function query(string $sql, array $param = null, bool $single = null): mixed
    {
        // création de la méthode
        // si $param est null alors faire une query sinon faire une requête prepare
        $method = is_null($param) ? 'query' : 'prepare';
        // si dans la requête en première position, il y a le mot DELETE, UPDATE ou INSERT
        if (
            strpos($sql, 'DELETE') === 0
            || strpos($sql, 'UPDATE') === 0
            || strpos($sql, 'INSERT') === 0
        ) {
            // création d'une requête prepare
            $req = $this->db->$method($sql);

            $req->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
            return $req->execute($param);
        }
        // si $single est null alors faire un fetchAll sinon faire un fetch 
        $fetch = is_null($single) ? 'fetchAll' : 'fetch';
        $req = $this->db->$method($sql);
        $req->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);

        // si la méthode est query retourne une requête simple
        if ($method === 'query') {
            return $req->$fetch();
            // sinon faire une requête préparée
        } else {
            $req->execute($param);
            return $req->$fetch();
        }
    }

    public function all(): array
    {
        return $this->query("SELECT * FROM {$this->table} ORDER BY created_at DESC");
    }  

    public function find(int $id): Model
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id], true);  
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

    // supprimer dans une table en fonction de l'id 
    public function delete(int $id): bool
    {
        return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }
}