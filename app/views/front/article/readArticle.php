<article id="one-article">
    <h1 class="title"><?= $params["article"]->title ?></h1>
    <figure class="img-size">
        <img class="article-img" src="/kercode-project/<?=$params['article']->img ?? "" ?>"
            alt="<?= $params['article']->img_name ?>">
    </figure>
    <p class="content"><?= $params["article"]->content ?></p>
    <a class='btn' href="/kercode-project/articles">Revenir sur tous les articles</a>
</article>