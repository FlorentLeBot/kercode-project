<?php

namespace Exceptions;

use Exception;
use Throwable;

class NotFoundException extends Exception{
    
    public function __construct($message = "", $code = 0, ?Throwable $previous = null){

        parent::__construct($message, $code, $previous);
    }

    // affichage de la page 404
    public function error404(){
        http_response_code(404);
        require VIEWSERRORS . '404.php';
    }
}