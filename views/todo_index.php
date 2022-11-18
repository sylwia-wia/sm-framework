<?php


use sm\UrlHelper;


/**
 * @var \sm\models\Todo[] $todos
 */
?>
<form>
    <div class="input-group mx-2">
        <input type="hidden" name="r" value="<?= $_GET['r'] ?>" />

        <input class="form-control" type="'text" name="search" placeholder="Wyszukaj po nazwie" value="<?= $_GET['search'] ?? '' ?>"/>
        <button class="btn btn-primary me-4 " type="submit">Szukaj</button>
    </div>
</form>

<a href="<?= UrlHelper::createUrl('todo', 'create') ?>" class="btn btn-primary mb-2 mt-4 mb-4">Dodaj kolejny wpis</a>
<ul class="list-unstyled list-group">
    <?php foreach ($todos as $todo): ?>
    <li clsss=" list-group-item ">
        <div class="btn-group mt2" role="group">

            <div class="input-group mx-2 mt-2">
                <input class="form-control " type="'text" name="name" value="<?= $todo->name ?>"/>
                <a href="<?= UrlHelper::createUrl('todo', 'update', ['id' => $todo->id]) ?>" class="btn btn-primary">Edytuj</a>

            </div>



            <form action="<?= UrlHelper::createUrl('todo', 'delete', ['id' => $todo->id]) ?>", method="POST">
                <button class="btn btn-primary  ms-2 mt-2 " type="submit">Usuń</button>
            </form>

        </div>
    </li>
    <?php endforeach; ?>
</ul>