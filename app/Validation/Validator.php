<?php

namespace App\Validation;

class Validator
{
    private $data;
    private $errors;
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    // validation des données pour la connexion à l'admin
    public function validate(array $rules): ?array
    {
        foreach ($rules as $name => $rulesArray) {
            if (array_key_exists($name, $this->data)) {
                foreach ($rulesArray as $rule) {
                    switch ($rule) {
                        case 'required':
                            $this->required($name, $this->data[$name]);
                            break;
                        case substr($rule, 0, 3) === 'min':
                            $this->min($name, $this->data[$name], $rule);
                            break;
                        default:
                            break;
                    }
                }
            }
        }
        return $this->getErrors();
    }

    // affichage des messages 
    private function required(string $name, string $value)
    {
        $value = trim($value);
        if (!isset($value) || is_null($value) || empty($value)) {
            $this->errors[$name][] = "Le {$name} est requis.";
        }
    }

    // affichage du message nombre de caractères minimum
    private function min(string $name, string $value, string $rule)
    {
        preg_match_all('/(\d+)/', $rule, $matches);
        $limit = (int) $matches[0][0];

        if (strlen($value) < $limit) {
            
            $this->errors[$name][] = "Le {$name} doit comprendre un minimum de {$limit} caractères.";
        }
    }

    // récupération des erreurs
    private function getErrors() : ?array{
        return $this->errors;
    }
}











































// <?php

// namespace App\Validation;

// class Validator
// {

//     private $data;
//     private $errors;

//     public function __construct(array $data)
//     {
//         $this->data = $data;
//     }
//     public function validate(array $rules): ?array
//     {
//         foreach ($rules as $name => $rulesArray) {
//             if (array_key_exists($name, $this->data)) {
//                 foreach ($rulesArray as $rule) {
//                     switch ($rule) {
//                         case 'required':
//                             $this->required($name, $this->data[$name]);
//                             break;
//                         case substr($rule,0,3) === 'min':
//                             $this->min($name, $this->data[$name], $rule);
//                         default:
//                             break;
//                     }
//                 }
//             }
//         }
//         return $this->getErrors();
//     }

//     private function required(string $name, string $value)
//     {
//         $value = trim($value);
//         // si la $value n'existe pas et null ou vide
//         if (!isset($value) || is_null($value) || empty($value)) {
//             $this->errors[$name][] = "{$name} est requis.";
//         }      
//     }
//     private function min(string $value, string $rule)
//     {
//         // récupération de tous les caractères numérique dans $rule
//         preg_match_all('/(\d+)/', $rule, $matches);
//         //var_dump($matches); die();
        
//         $limit = (int) $matches[0][0];
//         // si le nombre de caractère dans $value est strictement infèrieure à ma limite
//         if(strlen($value) < $limit){
//             // j'affiche un message
//             $this->errors[][] = "Vos identitfiants doivent comprendre un minimum de {$limit} caractères.";
//         }
//     }
//     private function getErrors(): ?array{
//         return $this->errors;
//     } 
// }