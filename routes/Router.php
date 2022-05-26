<?php

// namespace Router dans composer.json : autoload Router

namespace Router;

class Router{

    public $url;

    public function __construct($url)
    {
        $this->url = $url;
    }
    
}