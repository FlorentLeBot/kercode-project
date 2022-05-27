<section id="articles">

    <h1 class="title">Les derniers articles</h1>
    
    <!-- recuperation de tous mes articles -->
    <?php foreach ($params['articles'] as $article) : ?>
        
    <article class="">

        <h2><?= $article->getExcerptTitle() ?></h2>

        <!-- <figure>
            <img src="#" alt="#">
        </figure> -->

        <div class="tags">

        </div>

        <div class="excerpt">
            <p><?= $article->getExcerptContent() ?></p>
        </div>

        <small class="published">
            <?= $article->getCreatedAt() ?>
        </small>

        <a class="btn" title="#" href="/kercode-project/articles/<?= $article->id ?>">Lire l'article</a>

    </article>
    <?php endforeach ?>
</section>