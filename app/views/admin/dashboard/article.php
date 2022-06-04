<h1>Administration des articles</h1>

<div class="table">
    <h3 class="table-title">Id</h3>
    <h3 class="table-title">Titre</h3>
    <h3 class="table-title">Publié le</h3>
    <h3 class="table-title">Action</h3>
</div>

<?php foreach ($params['articles'] as $article) : ?>

<div class="table-results">
    <ul class="table-item">
        <li class="item article-id"><?= $article->id ?></li>
        <li class="item article-title"><?= $article->title ?></li>
        <li class="item article-created-at"><?= $article->getCreatedAt() ?></li>
        <li class="item">
            <button class="btn><a title="#" href="#">Modifier</a></button>
            <form action="/kercode-project/admin/articles/delete/<?= $article->id ?>">
                <span class="btn modale">
                    <button type="submit" class="btn">Supprimer</a></button>
            </form>
        </li>
    </ul>
</div>

<?php endforeach ?>