<!-- formulaire de connexion à l'adminsitration -->

<!-- gestion des erreurs -->
<?php if (isset($_SESSION['errors'])) : ?>

    <?php foreach ($_SESSION['errors'] as $errorsArray) : ?>
        <?php foreach ($errorsArray as $errors) : ?>
            <ul class="errors-login">
                <?php foreach ($errors as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach ?>
            </ul>
        <?php endforeach ?>
    <?php endforeach ?>
<?php endif ?>
<?php session_destroy() ?>

<h1 class="title">Connexion</h1>

<form id="form-login" action="/kercode-project/login" method="POST">
    <p class="item-form">
        <label for="username-login">Nom d'utilisateur</label>
        <input type="text" id="username-login" name="nom_utilisateur">
    </p>
    <p class="item-form">
        <label for="password-login">Mot de passe</label>
        <input type="password" id="password-login" name="mot_de_passe">
    </p>

    <button class="btn" type="submit">Se connecter</button>

</form>