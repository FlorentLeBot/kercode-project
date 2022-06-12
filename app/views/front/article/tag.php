<h1 class="title"><?= $params['tag']->name ?></h1>

<?php foreach ($params['tag']->getArticles() as $article) : ?>

<article>
    <!-- ne pas oublier de mettre un h2 -->
    <a href="/kercode-project/articles/<?= $article->id ?>"><?= $article->getExcerptTitle() ?></a>
    <!-- <figure>
        <img src="#" alt="#">
    </figure> -->
    <p><?= $article->content ?></p>
    <p><?= $article->getCreatedAt() ?></p>
</article>

<?php endforeach ?>