<?php

// importation des classes

use Router\Router;
use Exceptions\NotFoundException;

require '../vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Les constantes : mes chemins vers les vues et les scripts

define('VIEWS', dirname(__DIR__) . "/" . 'app' . "/" . 'Views' .  "/");
define('VIEWSADMIN', dirname(__DIR__) . "/" . 'app' . "/" . 'Views' . "/");

define('VIEWSERRORS', dirname(__DIR__) . "/" . 'app' . "/" . 'Views' .  "/" . 'errors' . "/");

define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . "/");

// creation d'une nouvelle instance de la classe Router

// $_GET['url'] est configuré dans .htaccess

$router = new Router($_GET['url']);

// creation de mes routes

// FRONT

// route en get ou en post avec comme parametre le chemin puis l'action

// affichage de la page d'accueil

$router->get('/', 'App\Controllers\HomeController&home');

// affichage de la page articles

$router->get('/articles', 'App\Controllers\ArticleController&articles');

// affichage d'un article

$router->get('/articles/:id', 'App\Controllers\ArticleController&article');

// affichage de la page jeux de société

$router->get('/games', 'App\Controllers\GameController&games');

// affichage d'un jeu de société

$router->get('/games/:id', 'App\Controllers\GameController&game');

// les articles par tag

$router->get('/tags/:id', 'App\Controllers\TagController&tag');

// les jeux par catégorie

$router->get('/categories/:id', 'App\Controllers\CategoryController&category');

// affichage de la page contact

$router->get('contact', 'App\Controllers\ContactController&contact');

// envoyer un email

$router->post('contact', 'App\Controllers\ContactController&postMail');

// ADMIN (CRUD)

/* ------ LIRE ------ */ 

// affichage de la page article

$router->get('/admin/articles', 'App\Controllers\Admin\AdminController&article');

// affichage de la page game

$router->get('/admin/games', 'App\Controllers\Admin\AdminController&game');

// affichage de la page email

$router->get('/admin/contact', 'App\Controllers\Admin\AdminController&contact');

// Lire un message

$router->get('/admin/contact/:id', 'App\Controllers\Admin\AdminController&readMessage');

/* ------ CREER ------ */ 

// créer un article

$router->get('/admin/articles/create', 'App\Controllers\Admin\AdminController&createTag');
$router->post('/admin/articles/create', 'App\Controllers\Admin\AdminController&createArticle');

// créer un jeu

$router->get('/admin/games/create', 'App\Controllers\Admin\AdminController&createCategory');
$router->post('/admin/games/create', 'App\Controllers\Admin\AdminController&createGame');

/* ------ METTRE A JOUR ------ */  

// mettre à jour un article

$router->get('/admin/articles/edit/:id', 'App\Controllers\Admin\AdminController&editArticle');
$router->post('/admin/articles/edit/:id', 'App\Controllers\Admin\AdminController&updateArticle');

// mettre à jour un jeu

$router->get('/admin/games/edit/:id', 'App\Controllers\Admin\AdminController&editGame');
$router->post('/admin/games/edit/:id', 'App\Controllers\Admin\AdminController&updateGame');

/* ------ SUPPRIMER ------ */ 

// supprimer un article

$router->post('/admin/articles/delete/:id', 'App\Controllers\Admin\AdminController&deleteArticle');

// supprimer un jeu

$router->post('/admin/games/delete/:id', 'App\Controllers\Admin\AdminController&deleteGame');

// supprimer un message

$router->post('/admin/contact/delete/:id', 'App\Controllers\Admin\AdminController&deleteMessage');

// Pagination

// Récupération des erreurs

try {
    $router->run();
} catch (NotFoundException $e) {
    return $e->error404();
}  
catch (Error $error){
    require VIEWSERRORS . 'error.php';
}
catch (Exception $e){
    require VIEWSERRORS . 'exception.php'; 
}
