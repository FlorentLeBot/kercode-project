<body>
    <div class="global-container">
        <nav id="side-nav">

            <p class="nav-title ">Admin</p>

            <div class="bloc-links">
                <a href="/kercode-project/admin/articles" class="bloc-link">
                    <i class="fa-solid fa-database"></i>
                    <span class="nav-links">Articles</span>
                </a>
                <a href="/kercode-project/admin/games" class="bloc-link">
                    <i class="fa-solid fa-database"></i>
                    <span class="nav-links">Fiches jeux</span>
                </a>
                <a href="/kercode-project/admin/contact" class="bloc-link">
                    <i class="fa-solid fa-envelope"></i>
                    <span class="nav-links">Contact</span>
                </a>

                <?php if (isset($_SESSION['authentication'])): ?>
                <a href="/kercode-project/logout" class="bloc-link">
                    <span class="nav-links">Se déconnecter</span>
                </a>
                <?php endif ?>

            </div>

        </nav>