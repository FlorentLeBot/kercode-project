<h1 class="title">Bienvenue</h1>

<!-- le slider -->

<div id="slider">

    <input class="radio-size" type="radio" name="slider" id="slide-1" checked>
    <input type="radio" name="slider" id="slide-2">
    <input type="radio" name="slider" id="slide-3">
    <input type="radio" name="slider" id="slide-4">
    <input type="radio" name="slider" id="slide-5">

    <label for="slide-1" class="img-size" id="slide1">
        <img src="public/Front/images/dixit.jpg" alt="dixit">
    </label>
    <label for="slide-2" class="img-size" id="slide2">
        <img src="public/Front/images/les-loups-garous-de-thiercelieux.jpg" alt="les loups garous de thiercelieux">
    </label>
    <label for="slide-3" class="img-size" id="slide3"><img src="public/Front/images/festival-international-jeux-cannes-2022.png"
            alt="as d'or 2022"></label>
    <label for="slide-4" class="img-size" id="slide4"><img src="public/Front/images/4751807e7755674766f7f333c6293280f5ec.jpeg"
            alt="room 25"></label>
    <label for="slide-5" class="img-size" id="slide5"><img src="public/Front/images/a627e4e61139af43c26eced38db13e610a44.jpeg"
            alt="le mito"></label>

</div>

<!-- affichage des 3 derniers articles -->

<section class="article-home w100 flex">

    <h2 class="w100">Découvrez nos actualités</h2>

    <?php foreach ($params['articles'] as $article) : ?>
    <article class="w100">
        <h3><?= $article->getExcerptTitle() ?></h3>
        <figure class="img-size">
            <img class="img-home" src="/kercode-project/<?=$article->img ?? "" ?>" alt="<?= $article->img_name ?>">
        </figure>

        <small class="published"><?= $article->getCreatedAt() ?></small>
        <a class='btn' title="lire le contenu de l'article" href="/kercode-project/articles/<?= $article->id ?>">Lire
            l'article</a>
    </article>
    <?php endforeach ?>
</section>

<!-- affichage des 3 derniers jeux -->

<section class="article-home w100 flex">

    <h2 class="w100">Les derniers jeux</h2>

    <?php foreach ($params['games'] as $game) : ?>
    <article class="w100">
        <h3><?= $game->getExcerptTitle() ?></h3>
        <figure class="img-size">
            <img class="img-home" src="/kercode-project/<?=$game->img ?? "" ?>" alt="<?= $game->img_name ?>">
        </figure>

        <small class="published"><?= $game->getCreatedAt() ?></small>
        <a class='btn' title="lire le contenu du jeu" href="/kercode-project/games/<?= $game->id ?>">Voir le jeu</a>

    </article>
    <?php endforeach ?>

</section>