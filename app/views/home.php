<h1 class="title">Bienvenue</h1>

<!-- affichage des 3 derniers articles -->

<section class="article-home">

    <h2>Découvrez nos actualités</h2>
    <div class="flex">
        <?php foreach ($params['articles'] as $article) : ?>
        <article>
            <h3><?= $article->getExcerptTitle() ?></h3>
            <figure class="img-size">
                <img class="img-home" src="/kercode-project/<?=$article->img ?? "" ?>" alt="<?= $article->img_name ?>">
            </figure>

            <small class="published"><?= $article->getCreatedAt() ?></small>
            <a class='btn' title="lire le contenu de l'article"
                href="/kercode-project/articles/<?= $article->id ?>">Lire
                l'article</a>
        </article>
        <?php endforeach ?>
    </div>
</section>
<!-- affichage des 3 derniers jeux -->

<section class="article-home">

    <h2>Les derniers jeux</h2>
    <div class="flex">
        <?php foreach ($params['games'] as $game) : ?>
        <article>
            <h3><?= $game->getExcerptTitle() ?></h3>
            <figure class="img-size">
                <img class="img-home" src="/kercode-project/<?=$game->img ?? "" ?>" alt="<?= $game->img_name ?>">
            </figure>

            <small class="published"><?= $game->getCreatedAt() ?></small>
            <a class='btn' title="lire le contenu du jeu" href="/kercode-project/games/<?= $game->id ?>">Voir le jeu</a>

        </article>
        <?php endforeach ?>
    </div>
</section>