<?php

// importation des classes

use Router\Router;

require '../vendor/autoload.php';

// creation d'une nouvelle instance de la classe Router

// $_GET['url'] est configuré dans .htaccess

$router = new Router($_GET['url']);

$router->showUrl();