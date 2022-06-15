<section id="tag-article" class="flex">

    <h1 class="title"><?= $params['tag']->name ?></h1>

    <!-- récupération de tous les articles par tag -->

    <?php foreach ($params['tag']->getArticles() as $article) : ?>

    <article>
        <h2><a href="/kercode-project/articles/<?= $article->id ?>"><?= $article->getExcerptTitle() ?></a></h2>
        <figure class="img-size">
            <img src="/kercode-project/<?=$article->img ?? "" ?>" alt="<?= $article->img_name ?>">
        </figure>
        <p class="content"><?= $article->getExcerptContent() ?></p>
        <a class="btn" title="lire un article" href="/kercode-project/articles/<?= $article->id ?>">Lire l'article</a>
    </article>

    <?php endforeach ?>

</section>