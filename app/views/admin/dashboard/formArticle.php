<h1 class='title'>Article</h1>

<form id="form-blog" enctype="multipart/form-data" method="POST"
    action="<?= isset($params['article']) ? "/kercode-project/admin/articles/edit/{$params['article']->id}" : "/kercode-project/admin/articles/create" ?>">
    <!-- TITRE -->
    <p>
        <label for="title-article">Titre de l'article *</label>
        <input id='title-article' type="text" name="title" value="<?= $params['article']->title ?? '' ?>" required>
    </p>
    <!-- CONTENU -->
    <p>
        <label for="content-article">Contenu de l'article *</label>
        <textarea name="content" id="content-article" cols="30" rows="8"
            required><?= $params['article']->content ?? '' ?></textarea>
    </p>
    <!-- IMAGE -->
    <p>
        <label for="img-article">Ajouter une image *</label>
        <input type="file" name="img" id="img-article" required>
    </p>
    <!-- NOM DE L'IMAGE -->
    <p>
        <label for="img-name-article">Donner un nom à l'image *</label>
        <input value="<?= $params['article']->img_name ?? '' ?>" type="text" name="img_name" id="img-name-article" required>
    </p>
    <!-- TAG -->
    <p>
        <label for="tags">Tags de l'article (Appuyez sur ctrl pour sélectionner plusieurs tags.) *</label>
        <select multiple name="tags[]" id="tags" required>
            <?php foreach ($params['tags'] as $tag) : ?>
            <option value="<?= $tag->id ?>" <?php if (isset($params['article'])) : ?> <?php foreach ($params['article']->getTags() as $articleTag) 
                            {
                            echo ($tag->id === $articleTag->id) ? 'selected' : '';
                            } ?> <?php endif ?>><?= $tag->name ?></option>
            <?php endforeach ?>
        </select>
    </p>

    <p>
        Tous les champs sont obligatoires *
    </p>
    <p>
        <!-- VALIDATION -->
        <button
           class="btn" type="submit"><?= isset($params['article']) ?  'Enregister les modifications' : 'Enregistrer mon article' ?>
        </button>
    </p>
</form>

