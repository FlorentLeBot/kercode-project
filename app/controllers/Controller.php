<?php

namespace App\Controllers;

use Database\DBConnection;

/* SOMMAIRE :

- view
- viewAdmin
- isAdmin

*/

abstract class Controller
{
    public $db;

    public function __construct(DBConnection $db)
    {
        // si on n'a pas de session on la démarre
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->db = $db;
    }

    // affichage des vues avec comme arguments le chemin et un paramètre optionnel (ex: id)
    protected function view(string $path, array $params = null): void
    {
        // système de buffering, enregistrement dans la mémoire tampon

        ob_start();

        $views = 'front' . "/" . 'layouts' . "/" . 'layout.php';
        $viewsAdmin = 'admin' . "/" . 'layouts' . "/" . 'layout.php';
        
        //  je remplace les . par des / dans le chemin
        $path = str_replace('.', "/", $path);
        
        require VIEWS . $path . '.php';

        if (
            strpos($path, 'admin') === 0

        ) {
            // je stocke ma vue dans la variable $adminContent
            $adminContent = ob_get_clean();

            require VIEWS . $viewsAdmin;
        } else {
            // je stocke ma vue dans la variable $content
            $content = ob_get_clean();

            require VIEWS . $views;
        }
    }

    // // affichage les vues de l'administration
    // protected function viewAdmin(string $path, array $params = null) : void
    // {

    //     ob_start();

    //     $path = str_replace('.', "/", $path);

    //     require VIEWS . $path . '.php';

    //     $adminContent = ob_get_clean();

    //     require VIEWSADMIN . "/" . 'admin' . "/" . 'layouts' . "/" . 'layout.php';
    // }

    protected function isAdmin(): bool
    {
        if (isset($_SESSION['authentication']) && $_SESSION['authentication'] == 1) {
            // var_dump($_SESSION['authentication']); die;
            return true;
        } else {
            return header('Location: /kercode-project/login');
        }
    }
}
