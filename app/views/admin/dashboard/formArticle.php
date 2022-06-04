<h2>Modifier <?= $params['article']->title ?></h2>

<form id="form-article" enctype="multipart/form-data" method="POST"
    action="/kercode-project/admin/articles/edit/<?= $params['article']->id ?>">
    <!-- TITRE -->
    <p>
        <label for="title-article">Titre de l'article</label>
        <input id='title-article' type="text" name="title" value="<?= $params['article']->title ?>">
    </p>
    <!-- CONTENU -->
    <p>
        <label for="content-article">Contenu de l'article</label>
        <textarea name="content" id="content-article" cols="30"
            rows="8"><?= $params['article']->content ?? ' ' ?></textarea>
    </p>

    <!-- TAG -->
    <p>
        <label for="tags">Tags de l'article</label>
        <select multiple name="tags[]" id="tags">
            <?php foreach ($params['tags'] as $tag) : ?>
            <option value="<?= $tag->id ?>" <?php if (isset($params['article'])) : ?> <?php foreach ($params['article']->getTags() as $articleTag) {
                    echo ($tag->id === $articleTag->id) ? 'selected' : '';
                    }
                    ?> <?php endif ?>><?= $tag->name ?></option>
            <?php endforeach ?>
        </select>
    </p>

    <p>
        <!-- VALIDATION -->
        <button
            type="submit"><?= isset($params['article']) ?  'Enregister les modifications' : 'Enregistrer mon article'?>
        </button>
    </p>
</form>