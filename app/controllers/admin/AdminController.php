<?php

namespace App\Controllers\Admin;

use App\Models\TagModel;
use App\Models\GameModel;
use App\models\ArticleModel;
use App\Models\ContactModel;
use App\models\CategoryModel;
use App\Controllers\Controller;

/* SOMMAIRE :

- article
- game
- contact
- readMessage

- createTag
- createCategory
- createArticle
- createGame

- editeArticle
- updateArticle
- editeGame
- updateGame

- deleteArticle
- deleteGame
- deleteMessage

*/

class AdminController extends Controller
{
    /* LES VUES */

    // -----------------------------------------------------------------------------------------------------

    // affichage de la page article - administration des articles
    public function article(): void
    { 
        $articles = (new ArticleModel($this->db))->all();
        $this->viewAdmin('admin.dashboard.article', compact('articles'));
    }

    // affichage de la page game - administration des fiches pour les jeux de société
    public function game(): void
    {
        $games = (new GameModel($this->db))->all();
        $this->viewAdmin('admin.dashboard.game', compact('games'));
    }

    // affichage de la page contact - récupération du formulaire de contact
    public function contact(): void
    {
        $contact = (new ContactModel($this->db))->getMail();
        $this->viewAdmin('admin.dashboard.contact', compact('contact'));
    }

     // lire le message complet
     public function readMessage(int $id): void
     {
         $msg = (new ContactModel($this->db))->find($id);
         $this->viewAdmin('admin.dashboard.readMessage', compact('msg'));
     }

    /* CREER */

    // -----------------------------------------------------------------------------------------------------
    
    public function createTag(): void
    {
        $tags = (new TagModel($this->db))->all();
        $this->viewAdmin('admin.dashboard.formArticle', compact('tags'));
    }

    public function createCategory(): void
    {
        $categories = (new CategoryModel($this->db))->all();
        $this->viewAdmin('admin.dashboard.formGame', compact('categories'));
    }

    public function createArticle(): void
    {
        $article = new ArticleModel($this->db);
        if (isset($_POST['tags'])) {
            // array_pop() dépile et retourne la valeur du dernier élément du tableau, le raccourcissant d'un élément.
            $tags = array_pop($_POST);
            $res = $article->create($_POST, $tags);
            header('Location: /kercode-project/admin/articles');
        } else {
            $res = $article->create($_POST);
            header('Location: /kercode-project/admin/articles');
        }
    }

    public function createGame(): void
    {
        $game = new GameModel($this->db);
        if (isset($_POST['categories'])) {
            // array_pop() dépile et retourne la valeur du dernier élément du tableau, le raccourcissant d'un élément.
            $categories = array_pop($_POST);
            $res = $game->create($_POST, $categories);
            header('Location: /kercode-project/admin/articles');
        } else {
            $res = $game->create($_POST);
            header('Location: /kercode-project/admin/articles');
        }
    }
    /* METTRE A JOUR */

    // -----------------------------------------------------------------------------------------------------

    public function editArticle(int $id)
    {
        $article = (new ArticleModel($this->db))->find($id);
        $tags = (new TagModel($this->db))->all();
        return $this->viewAdmin('admin.dashboard.formArticle', compact('article', 'tags'));
    }

    public function editGame(int $id)
    {
        $game = (new GameModel($this->db))->find($id);
        $categories = (new CategoryModel($this->db))->all();
        return $this->viewAdmin('admin.dashboard.formGame', compact('game', 'categories'));
    }

    // mettre à jour un article
    public function updateArticle(int $id)
    {
        // array_pop() dépile et retourne la valeur du dernier élément du tableau array, le raccourcissant d'un élément.
        $tags = array_pop($_POST);
        $res = (new ArticleModel($this->db))->updateArticle($id, $tags);
        if ($res) {
            header('Location: /kercode-project/admin/articles');
        }
    }

    // mettre à jour un jeu
    public function updateGame(int $id) : void
    {
        $game = new GameModel($this->db);
        $categories = array_pop($_POST);
        $res = $game->updateGame($id, $categories);
        // redirection
        if ($res) {
            header('Location: /kercode-project/admin/games');
        }
    }

    /* SUPPRIMER */

    // -----------------------------------------------------------------------------------------------------

    public function deleteArticle(int $id) : void
    {
        $res = (new ArticleModel($this->db))->delete($id);
        if ($res) {
            header("Location: /kercode-project/admin/articles");
        }
    }

    public function deleteGame(int $id) : void
    {
        $res = (new GameModel($this->db))->delete($id);
        if ($res) {
            header("Location: /kercode-project/admin/games");
        }
    }

    // public function deleteMessage(int $id): void
    // {
    //     $res = (new ContactModel($this->db))->delete($id);      
    //     if ($res) {
    //         header('Location: /kercode-project/admin/contact');
    //     }
    // }
    public function deleteMessage(int $id): void
    {
        $message = new ContactModel($this->db);
        $res = $message->delete($id);
      
        if ($res) {
            header('Location: /kercode-project/admin/contact');
        }
    }

}  