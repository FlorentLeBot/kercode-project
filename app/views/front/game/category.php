<h1><?= $params['category']->name ?></h1>

<?php foreach ($params['category']->getGames() as $game) : ?>

<article>
    <h2><a href="/kercode-project/games/<?= $game->id ?>"><?= $game->getExcerptTitle() ?></a></h2>
    <img class="game-img" src="/kercode-project/<?=$game->img ?? "" ?>" alt="<?= $game->img_name ?>">
    <p><?= $game->content ?></p>
    <p><?= $game->getCreatedAt() ?></p>
</article>

<?php endforeach ?>