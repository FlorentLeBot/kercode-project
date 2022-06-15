<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Validation\Validator;

class UserController extends Controller
{
    // affichage de la page login pour l'administration
    public function login()
    {
        return $this->view('authentication.login');
    }


    public function loginPost()
    {
        // gestion des erreurs
        $valitator = new Validator($_POST);
        $errors = $valitator->validate([
            'nom_utilisateur' => ['required', 'min:8'],
            'mot_de_passe' => ['required']
        ]);

        if ($errors) {
            $_SESSION['errors'][] = $errors;
            header('Location: /kercode-project/login');
            exit;
        }
        // var_dump($_POST['nom_utilisateur']);die;
       
        $user = (new UserModel($this->db))->getConnection($_POST['nom_utilisateur']);
    
            if (password_verify($_POST['mot_de_passe'], $user->mot_de_passe)) {
                $_SESSION['authentication'] = (int) $user->admin;

                return header('Location: /kercode-project/admin/articles');
            } else {
                return header('Location: /kercode-project/login');
            }
    }

    public function logout()
    {
        session_destroy();
        return header('Location: /kercode-project/');
    }
}