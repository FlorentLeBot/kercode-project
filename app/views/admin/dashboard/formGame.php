<h1 class="title"><?= $params['game']->title ??  "Création d'un jeu" ?></h1>

<form id="form-game" enctype="multipart/form-data" method="POST"
    action="<?= isset($params['game']) ? "/kercode-project/admin/games/edit/{$params['game']->id}" : "/kercode-project/admin/games/create" ?>">
    <!-- TITRE -->
    <p>
        <label for="title-game">Titre du jeu *</label>
        <input id='title-game' type="text" name="title" value="<?= $params['game']->title ?? '' ?>" required>
    </p>
    <!-- CONTENU -->
    <p>
        <label for="content-game">Contenu *</label>
        <textarea name="content" id="content-game" cols="30" rows="8"
            required><?= $params['game']->content ?? ' ' ?></textarea>
    </p>
    <!-- IMAGE -->
    <p>
        <label for="img-game">Ajouter une image *</label>
        <input type="file" name="img" id="img-game" required>
    </p>

    <!-- NOM DE L'IMAGE -->
    <p>
        <label for="img-name-game">Donner un nom à l'image *</label>
        <input value="<?= $params['game']->img_name ?? '' ?>" type="text" name="img_name" id="img-name-game" required>
    </p>

    <!-- TAG -->
    <p>
        <label for="categories">Categories du jeu *</label>
        <select multiple name="categories[]" id="categories" required>
            <?php foreach ($params['categories'] as $category) : ?>
            <option value="<?= $category->id ?>" <?php if (isset($params['game'])) : ?> <?php foreach ($params['game']->getcategories() as $gameCategory) {
                    echo ($category->id === $gameCategory->id) ? 'selected' : '';
                    }
                    ?> <?php endif ?>><?= $category->name ?></option>
            <?php endforeach ?>
        </select>
    </p>
    <p>
        Tous les champs sont obligatoires *
    </p>
    <p>
        <!-- VALIDATION -->
        <button class="btn" type="submit"><?= isset($params['game']) ?  'Enregister les modifications' : 'Enregistrer'?>
        </button>
    </p>
</form>