<section id="category-article" class="flex">
     
    <h1 class="title"><?= $params['category']->name ?></h1>

    <!-- récupération de tous les jeux par catégories -->

    <?php foreach ($params['category']->getGames() as $game) : ?>

    <article>
        <h2><a href="/kercode-project/games/<?= $game->id ?>"><?= $game->getExcerptTitle() ?></a></h2>
        <figure class="img-size">
            <img class="game-img" src="/kercode-project/<?=$game->img ?? "" ?>" alt="<?= $game->img_name ?>">
        </figure>
        <p class="content"><?= $game->getExcerptContent() ?></p>
        <a class="btn" title="lire les informations sur le jeu" href="/kercode-project/articles/<?= $game->id ?>">Lire</a>
    </article>

    <?php endforeach ?>

</section>