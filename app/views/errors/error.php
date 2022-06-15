
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page erreur</title>
    <link rel="stylesheet" href="<?= SCRIPTS . 'Front' . "/" . 'css' . "/" . 'style.css' ?>">
</head>

<body>  
    <main class="container error">
        <h1 class="title">Erreur</h1>
        <a title="revenir à l'accueil" class="btn" href="/kercode-project">Revenir à l'accueil</a>
        <p><?= $error ?></p>
    </main>
</body>

</html>