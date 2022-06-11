<h2 class="main-title">Création d'une fiche de jeu</h2>

<?php require_once "search.php" ?>

<button class="btn"><a href="/kercode-project/admin/games/create/">Créer une fiche jeu</a></button>

<div class="table">
    <h3 class="table-title">Id</h3>
    <h3 class="table-title">Titre</h3>
    <h3 class="table-title">Publié le</h3>
    <h3 class="table-title">Action</h3>
</div>

<?php foreach ($params['games'] as $game) : ?>

<div class="table-results">
    <ul class="table-item">
        <li class="game-id"><?= $game->id ?></li>
        <li class="game-title"><?= $game->title ?></li>
        <li class="game-created-at"><?= $game->getCreatedAt() ?></li>
        <li>
            <button class="btn"><a href="/kercode-project/admin/games/edit/<?= $game->id ?>">Modifier</a></button>
            <form action="/kercode-project/admin/games/delete/<?= $game->id ?>" method="post">
                <button class="btn" type="submit">Supprimer</button>
            </form>
            
        </li>
    </ul>
</div>

<?php endforeach ?>