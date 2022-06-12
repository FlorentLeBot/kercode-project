<h1 class="title">Les messages</h2>

    <?php require_once "search.php" ?>

    <div class="table">
        <h2 class="table-title">Utilisateur</h2>
        <h2 class="table-title">Email</h2>
        <h2 class="table-title">Message</h2>
        <h2 class="table-title">Action</h2>
    </div>

    <?php foreach ($params['contact'] as $contact) : ?>

    <div class="table-results">
        <ul class="table-item">
            <li class="item"><?= $contact->firstname . " " . $contact->lastname ?></li>
            <li class="item"><?= $contact->email ?></li>
            <li class="item"><?= $contact->getExcerptContent() ?></li>
            <li>
                <a class="btn" title="Lire l'email" href="/kercode-project/admin/contact/<?= $contact->id ?>">Lire le
                    message</a>
                <form action="/kercode-project/admin/contact/delete/<?= $contact->id ?>" method="post">
                    <button class="btn" type="submit">Supprimer</button>
                </form>
            </li>
        </ul>
    </div>

    <?php endforeach ?>