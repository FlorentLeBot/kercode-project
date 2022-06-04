<?php

// namespace Router dans composer.json : autoload Router

namespace Router;

use Exceptions\NotFoundException;


class Router{

    public function __construct(public string $url, public $routes = [] )
    {
        // retirer les / en début et fin d'url
        $this->url = trim($url, '/');
    }

    // les routes en get

    public function get(string $path, string $action)
    {
        // var_dump($this->routes['GET'][]); die;
        $this->routes['GET'][]  = new Route($path, $action);
    }
    
    // les routes en post

    public function post(string $path, string $action)
    {
        // var_dump($this->routes['GET'][]); die;
        $this->routes['POST'][]  = new Route($path, $action);
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
        throw new NotFoundException();
    }   
}