<h1 class="title">Bienvenue</h1>

<!-- le slider -->

<div id="slider">

    <input class="radio-size" type="radio" name="slider" id="slide-1" checked>
    <input type="radio" name="slider" id="slide-2">
    <input type="radio" name="slider" id="slide-3">
    <input type="radio" name="slider" id="slide-4">
    <input type="radio" name="slider" id="slide-5">

    <label for="slide-1" class="img-size" id="slide1">
        <img src="public/upload/62a9d9bb4395e1.26755034.webp" alt="le 6 qui surprend">
    </label>
    <label for="slide-2" class="img-size" id="slide2">
        <img src="public/upload/62a9d9cf364857.40974609.jpg" alt="le dixit">
    </label>
    <label for="slide-3" class="img-size" id="slide3"><img src="public/upload/62a9d9a0b83427.28919719.jpg"
            alt="vraiement très futé"></label>
    <label for="slide-4" class="img-size" id="slide4"><img src="public/upload/62a9d98d15aa25.55872145.jpg"
            alt="pandemic"></label>
    <label for="slide-5" class="img-size" id="slide5"><img src="public/upload/62a9da4328f5a5.73685924.png"
            alt="as d'or 2022"></label>

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