<?php

namespace App\Controllers;

use Database\DBConnection;

/* Sommaire des méthodes :
- view
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

    // FRONT

    // affichage des vues avec comme arguments le chemin et un paramètre optionnel (ex: id)
    protected function view(string $path, array $params = null)
    {
        // système de buffering, enregistrement dans la mémoire tampon
        ob_start();
        
        // je remplace les . par des / dans le chemin
        $path = str_replace('.', "/", $path);

        require VIEWS . $path . '.php';

        // je stocke ma vue dans la variable $content
        $content = ob_get_clean();

        require VIEWS . "/" .  'front' . "/" . 'layouts' . "/" . 'layout.php';
    }
}
