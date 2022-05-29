<h1><?= $params['category']->name ?></h1>

<?php foreach ($params['category']->getGames() as $game) : ?>

<article>
    <a href="/monprojet/game/<?= $game->id ?>"><?= $game->title ?></a>
    <p><?= $game->content ?></p>
</article>

<?php endforeach ?>
