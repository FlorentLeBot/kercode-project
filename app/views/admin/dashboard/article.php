<h1 class="title">Les Articles</h1>

<?php require_once "search.php" ?>

<a class="btn" title="création d'un article" href="/kercode-project/admin/articles/create/">Créer un article</a>

<div class="table">
    <h2 class="table-title">Id</h2>
    <h2 class="table-title">Titre</h2>
    <h2 class="table-title">Publié le</h2>
    <h2 class="table-title">Action</h2>
</div>

<?php foreach ($params['articles'] as $article) : ?>

<div class="table-results">
    <ul class="table-item">
        <li class="item article-id"><?= $article->id ?></li>
        <li class="item article-title"><?= $article->title ?></li>
        <li class="item article-created-at"><?= $article->getCreatedAt() ?></li>
        <li>
            <a title="Modification d'un article"
                href="/kercode-project/admin/articles/edit/<?= $article->id ?>">Modifier</a>
            <form action="/kercode-project/admin/articles/delete/<?= $article->id ?>" method="post">
                <button type="submit" class="btn">Supprimer</button>
            </form>
        </li>
    </ul>
</div>

<?php endforeach ?>