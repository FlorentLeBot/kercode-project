<h1 class="title">Création d'une fiche de jeu</h1>

<?php require_once "search.php" ?>

<a class="btn" title="Créer une fiche pour un jeu de société" href="/kercode-project/admin/games/create/">Créer une fiche jeu</a>

<div class="table">
    <h2 class="table-title">Id</h2>
    <h2 class="table-title">Titre</h2>
    <h2 class="table-title">Publié le</h2>
    <h2 class="table-title">Action</h2>
</div>

<?php foreach ($params['games'] as $game) : ?>

<div class="table-results">
    <ul class="table-item">
        <li class="item"><?= $game->id ?></li>
        <li class="item"><?= $game->getExcerptTitle() ?></li>
        <li class="item"><?= $game->getCreatedAt() ?></li>
        <li>
            <a class="btn" title="Modification de la fiche du jeu de société" href="/kercode-project/admin/games/edit/<?= $game->id ?>">Modifier</a>
            <form action="/kercode-project/admin/games/delete/<?= $game->id ?>" method="post">
                <button class="btn" type="submit">Supprimer</button>
            </form>  
        </li>
    </ul>
</div>

<?php endforeach ?>