<h1 class="title">Message</h1>

<ul class="table-item">
    <li class="item"><?= $params['msg']->firstname . ' ' . $params['msg']->lastname ?></li>
    <li class="item"><?= $params['msg']->email ?></li>
    <li class="item"><?= $params['msg']->content ?></li>
    <li>
        <form action="/kercode-project/admin/contact/delete/<?= $params['msg']->id ?>" method="post">
            <button class="btn" type="submit">Supprimer</button>
        </form>
    </li>
</ul>