<article id="game" class="w100 flex">

    <h1 class="title"><?= $params['game']->title ?></h1>
    <div class="item">
        <figure class="img-size">
            <img src="/kercode-project/<?=$params['game']->img ?? "" ?>" alt="<?= $params['game']->img_name ?>">
        </figure>
    </div>
    <div class="item">
        <p class="content"><?= $params['game']->content ?></p>
        <a title="Revenir sur la page de tous les jeux" class='btn' href="/kercode-project/games">Tous les jeux</a>
    </div>

</article>