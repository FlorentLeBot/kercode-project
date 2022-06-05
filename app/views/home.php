<h1 class="title">Bienvenue</h1>

<!-- affichage des 3 derniers articles -->

<section class="card">

    <h2>Les derniers articles</h2>

    <?php foreach ($params['articles'] as $article) : ?>
    <article>
        <h3><?= $article->title ?></h3>
        <!-- <figure>
            <img src="#" alt="#">
        </figure> -->
        <small class="published"><?= $article->getCreatedAt() ?></small>
    </article>
    <?php endforeach ?>
</section>

<!-- affichage des 3 derniers jeux -->

<section class="card">

    <h2>Les derniers jeux</h2>

    <?php foreach ($params['games'] as $game) : ?>
    <article>
        <h3><?= $game->title ?></h3>
        <!-- <figure>
            <img src="#" alt="#">
        </figure> -->
        <small class="published"><?= $game->getCreatedAt() ?></small>
    </article>
    <?php endforeach ?>
</section>