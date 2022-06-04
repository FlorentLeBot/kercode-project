<?php

namespace App\Controllers\Admin;

use App\Models\TagModel;
use App\Models\GameModel;
use App\models\ArticleModel;
use App\Controllers\Controller;

/* Sommaire des méthodes:
- article
- game
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
    public function editArticle(int $id)
    {
        $article = (new ArticleModel($this->db))->find($id);
        $tags = (new TagModel($this->db))->all();
        return $this->viewAdmin('admin.dashboard.formArticle', compact('article', 'tags'));
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
    // supprimer un article
    public function delete(int $id)
    {
        $res = (new ArticleModel($this->db))->delete($id);
        if ($res) {
            header("Location: /kercode-project/admin/articles");
        }
    }
}