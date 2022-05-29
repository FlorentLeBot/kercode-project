<?php

namespace Router;

use Database\DBConnection;

class Route
{
    // syntaxe php 8 : public string $path directement dans les parametres
    public function __construct(public string $path, public string $action) 
    {
        // retirer les / en début et fin d'url
        $this->path = trim($path, '/');
    }

    // méthode de correspondance de l'url
    public function matches(string $url)
    {
        // création d'un nouveau chemin
        // regex (Tous les caractères alpha-numérique)
        $path = preg_replace('#:([A-Za-z0-9_]+)#', '([^/]+)', $this->path);
        // var_dump($path);die();

        // tout le chemin
        $pathToMatch = "#^$path$#";
        // var_dump($pathToMatch);die();

        if (preg_match($pathToMatch, $url, $matches)) {
            $this->matches = $matches;
            return true;
        } else {
            return false;
        }
    }

    public function execute()
    {
        // recuperation du chemin et de la methode qui a pour delimiteur &
        $params = explode('&', $this->action);
        // la première clé est le controller et la seconde la méthode
        // création d'une nouvelle instance d'un Controller
        $controller = new $params[0](new DBConnection());
        $method = $params[1];
        // recuperation avec ou sans parametre
        return isset($this->matches[1]) ? $controller->$method($this->matches[1]) : $controller->$method();
    }
}
