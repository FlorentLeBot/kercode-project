<h1><?= $params['category']->name ?></h1>

<?php foreach ($params['category']->getGames() as $game) : ?>

<article>
    <h2><a href="/kercode-project/games/<?= $game->id ?>"><?= $game->getExcerptTitle() ?></a></h2>
    <p><?= $game->content ?></p>
    <p><?= $game->createdAt() ?></p>
</article>

<?php endforeach ?>