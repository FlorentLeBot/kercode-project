<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Au royaume des jeux</title>

    <!-- cdn font-awesome -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">

    <!-- google font -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Rajdhani:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="<?= SCRIPTS . 'Front' . "/" . 'css' . "/" . 'main.min.css' ?>">
</head>

<body>
    <header id="main-header">
        <div class="container">

            <!-- logo -->

            <figure class="w100 flex">
                <a href="/kercode-project/" title="logo du site">
                    <img class="logo" src="../../kercode-project/public/front/images/logo-jeux-de-societe.svg"
                        alt="logo dessin de jeu de société">
                </a>
            </figure>

            <!-- les boutons des réseaux sociaux -->
            <!-- utilisation d'une div : pas de titre pour l'utilisation d'une section -->
            <div id="btn-social-networks">
                <a title="facebook" class="btn-social-networks" href="https://fr-fr.facebook.com/"><i class="fab fa-facebook"></i></a>
                <a title="twitter" class="btn-social-networks" href="https://twitter.com"><i class="fab fa-twitter"></i></a>
                <a title="instagram" class="btn-social-networks" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
            </div>

            <!-- le menu burger  -->
            <div class="menu-wrap">

                <input type="checkbox" class="toggler" aria-label="menu burger" />

                <div class="hamburger">
                    <!-- gestion des 3 lignes du burger grace a une div (after et before) -->
                    <div></div>
                </div>
                <div class="menu">
                    <div class="container-menu">
                        <!-- menu principal -->
                        <nav id="main-menu"  >
                            <ul class="bloc-links">
                                <li>
                                    <a class="link" title="l'accueil" href="/kercode-project/">Accueil</a>
                                </li>
                                <li>
                                    <a class="link" title="les jeux de société" href="/kercode-project/games">Jeux de
                                        société</a>
                                </li>
                                <li>
                                    <a class="link" title="le blog" href="/kercode-project/articles">Articles</a></li>
                                <li>
                                    <a class="link" title="nous contacter" href="/kercode-project/contact">Contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </header>