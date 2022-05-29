<?php

// importation des classes

use Router\Router;

require '../vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Les constantes : mes chemins vers les vues et les scripts

define('VIEWS', dirname(__DIR__) . "/" . 'app' . "/" . 'Views' .  "/");
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . "/");

// creation d'une nouvelle instance de la classe Router

// $_GET['url'] est configuré dans .htaccess

$router = new Router($_GET['url']);

// creation de mes routes

// FRONT

// route en get ou en post avec comme parametre le chemin puis l'action

// affichage de la page home

$router->get('/', 'App\Controllers\HomeController&home');

// affichage de la page articles

$router->get('/articles', 'App\Controllers\ArticleController&articles');

// affichage d'un article

$router->get('/articles/:id', 'App\Controllers\ArticleController&article');

// affichage de la page games

// affichage de la page contact

// les articles par tag

$router->get('/tags/:id', 'App\Controllers\TagController&tag');

// les jeux par catégorie

// ADMIN

// affichage de la page article

// affichage de la page game

// affichage de la page email

$router->run();