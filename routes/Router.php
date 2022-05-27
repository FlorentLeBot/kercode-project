<?php

// namespace Router dans composer.json : autoload Router

namespace Router;

class Router{

    // public $url;
    // public $routes = [];

    public function __construct(public string $url, public $routes = [] )
    {
        // retirer les / en début et fin d'url
        $this->url = trim($url, '/');
    }

    public function get(string $path, string $action)
    {
        // var_dump($this->routes['GET'][]); die;
        $this->routes['GET'][]  = new Route($path, $action);
    }
    
    public function run()
    {
        // 'REQUEST_METHOD' : methode de requete utilisee pour acceder a la page : par exemple 'GET', 'HEAD', 'POST', 'PUT' 
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            // si notre route correspond à l'url 
            if ($route->matches($this->url)) {
                // on exécute
                return $route->execute();
            }
        }
        return header('HTTP/1.0 404 Not Found');
    }   
}