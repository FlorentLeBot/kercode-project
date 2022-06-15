<article id="one-article" class="w100 flex">

    <h1 class="title"><?= $params["article"]->title ?></h1>
    <div class="item">
        <figure class="img-size">
            <img src="/kercode-project/<?=$params['article']->img ?? "" ?>" alt="<?= $params['article']->img_name ?>">
        </figure>
    </div>
    <div class="item">
        <p class="content"><?= $params["article"]->content ?></p>
        <a title="revenir sur la page de tous les articles" class='btn' href="/kercode-project/articles">Revenir sur
            tous les articles</a>
    </div>
</article>