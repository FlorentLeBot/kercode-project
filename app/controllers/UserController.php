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
            'username'=> ['required', 'min:3'],
            'password'=> ['required']
        ]);
  
        if($errors){
            $_SESSION['errors'][] = $errors;
            header('Location: /kercode-project/login');
            exit;
        }
        $user = (new UserModel($this->db))->getConnection($_POST['username']);
        // var_dump($user); die;

        if (password_verify($_POST['password'], $user->password)) {
            $_SESSION['authentication'] = (int) $user->admin;

            return header('Location: /kercode-project/admin/articles');
        } else {
            return header('Location: /kercode-project/login');
        }
    }
    
    // $username = htmlspecialchars($_POST['username']);
    // $password = $_POST['password'];
    // $res = (new UserModel($this->db))->getConnection($username, $password);
    // $isPasswordCorrect = password_verify($password, $res->password);
    // $_SESSION['username'] = $res->username; // transformation des variables recupérées en session
    // $_SESSION['mdp'] = $res->password;
    //     // var_dump($username, $password); die;
    //     if (!empty($username) && !empty($password)) {
    //         if ($isPasswordCorrect && $username) {
    //             header('Location: /kercode-project/admin/articles');
    //         } else {

    //             echo 'vos identifients sont incorrect';
    //         }
    //     } else {
    //         echo 'renseigner vos identifiants';
    //     }
    // } 








    public function logout()
    {
        session_destroy();
        return header('Location: /kercode-project/');
    }
}
