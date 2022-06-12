<h1><?= $params['category']->name ?></h1>

<?php foreach ($params['category']->getGames() as $game) : ?>

<article>
    <!-- ne pas oublier de mettre un h2 à l'article -->
<a href="/kercode-project/games/<?= $game->id ?>"><?= $game->getExcerptTitle() ?></a>
    <p><?= $game->content ?></p>
</article>

<?php endforeach ?>
