<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Validation\Validator;

class UserController extends Controller
{
    public function login()
    {
        return $this->view('authentication.login');
    }

    public function loginPost()
    {

        // gestion des erreurs
        $valitator = new Validator($_POST);
        $errors = $valitator->validate([
            'username' => ['required', 'min:6'],
            'password' => ['required']
        ]);

        if ($errors) {
            $_SESSION['errors'][] = $errors;
            header('Location: /kercode-project/login');
            exit;
        }
        // var_dump($_POST['username']);die;
       
        $user = (new UserModel($this->db))->getConnection($_POST['username']);
    
            if (password_verify($_POST['password'], $user->password)) {
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