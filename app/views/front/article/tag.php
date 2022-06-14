<h1 class="title"><?= $params['tag']->name ?></h1>

<?php foreach ($params['tag']->getArticles() as $article) : ?>

<article>
    <h2><a href="/kercode-project/articles/<?= $article->id ?>"><?= $article->getExcerptTitle() ?></a></h2>
    <img class="article-img" src="/kercode-project/<?=$article->img ?? "" ?>" alt="<?= $article->img_name ?>">
    <p><?= $article->content ?></p>
    <p><?= $article->getCreatedAt() ?></p>
</article>

<?php endforeach ?>