<h1 class="title">Jeux de société</h1>
<section id="games">

    <?php foreach ($params['games'] as $game) : ?>

    <article class="games">

        <h2 class="title-game"><?= $game->title ?></h2>

        <figure>
            <img class="game-img" src="/kercode-project/<?=$game->img ?? "" ?>" alt="<?= $game->img_name ?>">
        </figure>

        <div class="categories">
            <?php foreach ($game->getCategories() as $category) : ?>
            <span class="category">
                <a href="/kercode-project/categories/<?= $category->id ?>"><?= $category->name ?></a>
            </span>
            <?php endforeach ?>
        </div>
   
        <a class="btn" title="#" href="/kercode-project/games/<?= $game->id ?>">Lire</a>

    </article>
    <?php endforeach ?>
</section>