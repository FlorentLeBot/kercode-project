<?php

namespace App\models;

use PDO;
use DateTime;
use Database\DBConnection;

/* SOMMAIRE :

- query
- all
- find
- getCreatedAt
- getExcerptContent
- getExcerptTitle
- update
- delete 
- upload 

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
        // puis je formate
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

    public function create(array $data, ?array $tags = null, ?array $category = null) : mixed
    {
        // les parenthèses de la requete
        $firstParenthesis = "";
        $secondParenthesis = "";
        $i = 1;

        foreach ($data as $key => $value) {
            $comma = $i === count($data) ? "" : ", ";
            $firstParenthesis .= "{$key}{$comma}";
            $secondParenthesis .= ":{$key}{$comma}";
            $i++;
        }

        return $this->query("INSERT INTO {$this->table} ($firstParenthesis) VALUES ($secondParenthesis)", $data);
    }

    // mettre à jour dans la table les champs en fonction de l'id de maniere dynamique
    public function update(array $data, $tag = null, $category = null): mixed
    {   
        $sqlRequestPart = "";
        $i = 1;

        //récupération des champs d'un formulaire 
        foreach ($data as $key => $value) {
            // si on arrive à la fin on s'arrete sinon on rajoute une virgule
            $comma = $i === count($data) ? '' : ', ';
            $i++;
            if ($key === "id") {
                continue;
            }
            // ex : title, = la clé du tableau qui push dans sqlRequestPart 
            $sqlRequestPart .= "{$key} = :{$key}{$comma}";   
        }

        return $this->query("UPDATE {$this->table} SET {$sqlRequestPart} 
                            WHERE id = :id", $data);
    }

    // supprimer dans une table en fonction de l'id 
    public function delete(int $id): bool
    {
        return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }

    // enregistrement d'une image
    public function upload(array $file): string
    {
        // récupération des valeurs de $_FILES
        if (isset($file['img'])) {
            $name = $file['img']['name'];
            $tmpName = $file['img']['tmp_name'];
            $error = $file['img']['error'];
            $size = $file['img']['size'];
        }

        // séparation du nom de l'image et de son extension 
        $tabExtension = explode('.', $name);
        // transformation de l'extension en minuscule
        $extension = strtolower(end($tabExtension));
        // extensions accepté
        $extensions = ['jpg', 'png', 'jpeg', 'gif', 'webp'];
        // taille maximum d'une image
        $maxSize = 400000000;
        $path = "";
        // si le nom de l'extension, la taille maximum et le code d'erreur est égal à 0 (aucune erreur de téléchargement)...
        if (in_array($extension, $extensions) && $size <= $maxSize && $error == 0) {
            // créer un nom unique ...
            $uniqueName = uniqid('', true);
            // rajouter le point et le nom de l'extension 
            $file = $uniqueName . "." . $extension;
            // télécharger l'image      
            move_uploaded_file($tmpName, './upload/' . $file);
            $path = "/public/upload/" . $file;
        } else {
            echo 'Une erreur est survenue';
        }
        $path = htmlspecialchars($path);
        return $path;
    }
}