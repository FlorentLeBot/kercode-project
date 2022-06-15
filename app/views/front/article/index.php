<section id="articles" class="flex w100">

    <h1 class="title">Les derniers articles</h1>

    <!-- recuperation de tous mes articles -->

    <?php foreach ($params['articles'] as $article) : ?>
    <article>

        <h2><?= $article->getExcerptTitle() ?></h2>

        <figure class="img-size">
            <img class="article-img" src="/kercode-project/<?=$article->img ?? "" ?>" alt="<?= $article->img_name ?>">
        </figure>

        <!-- recuperation des tags -->
        <div class="tags flex">
            <?php foreach($article->getTags() as $tag) : ?>
            <span class="tag">
                <a title="le nom des tags" href="/kercode-project/tags/<?= $tag->id ?>"><?= $tag->name ?></a>
            </span>
            <?php endforeach ?>
        </div>

        <div class="excerpt">
            <p><?= $article->getExcerptContent() ?></p>
        </div>

        <small class="published">
            <?= $article->getCreatedAt() ?>
        </small>

        <a title="lire l'article" class="btn" title="lire un article"
            href="/kercode-project/articles/<?= $article->id ?>">Lire l'article</a>

    </article>
    <?php endforeach ?>

</section>