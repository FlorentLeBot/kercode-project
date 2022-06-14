<article id="game">
    <div>
        <h1 class="title"><?= $params['game']->title ?></h1>
        <img class="game-img" src="/kercode-project/<?=$params['game']->img ?? "" ?>"
            alt="<?= $params['game']->img_name ?>">
    </div>
    <div>
        <p class="content"><?= $params['game']->content ?></p>
        <a class='btn' href="/kercode-project/games">Tous les jeux</a>
    </div>
</article>