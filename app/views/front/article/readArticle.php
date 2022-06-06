<article id="one-article">
    <h1 class="title"><?= $params["article"]->title ?></h1>
    <figure>
        <img class="article-img" src="/kercode-project/<?=$params['article']->img ?? "" ?>"
            alt="<?= $params['article']->img_name ?>">
    </figure>
    <p><?= $params["article"]->content ?></p>
    <a class='btn' href="/kercode-project/articles">Revenir sur tous les articles</a>
</article>