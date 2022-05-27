<?php

namespace App\Controllers;

/* Sommaire des méthodes :
- view
*/

class Controller
{

    // FRONT

    // affichage des vues avec comme arguments le chemin et un paramètre optionnel (ex: id)
    protected function view(string $path, array $params = null)
    {
        // système de buffering, enregistrement dans la mémoire tampon
        ob_start();
        
        // je remplace les . par des / dans le chemin
        $path = str_replace('.', "/", $path);

        require VIEWS . $path . '.php';

        if($params){
            $params = extract($params);
        }
        // je stocke ma vue dans la variable $content
        $content = ob_get_clean();

        require VIEWS . "/" .  'front' . "/" . 'layouts' . "/" . 'layout.php';
    }
}
