<section id="games" class="flex">

    <h1 class="title">Jeux de société</h1>

    <?php foreach ($params['games'] as $game) : ?>

    <article>

        <h2><?= $game->getExcerptTitle() ?></h2>

        <figure class="img-size">
            <img class="game-img" src="/kercode-project/<?=$game->img ?? "" ?>" alt="<?= $game->img_name ?>">
        </figure>
        

        <div class="categories flex">
            <?php foreach ($game->getCategories() as $category) : ?>
            <span class="category">
                <a title="Une catégorie de jeu de société"
                    href="/kercode-project/categories/<?= $category->id ?>"><?= $category->name ?></a>
            </span>
            <?php endforeach ?>
        </div>

        <a class="btn" title="consulter une fiche d'un jeu de société"
            href="/kercode-project/games/<?= $game->id ?>">Lire</a>

    </article>
    <?php endforeach ?>

</section>