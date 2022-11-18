<?php

use sm\UrlHelper;

?>

<div class=" mx-4 my-4 ">
    <h1>To do list</h1>

    <form action="<?= UrlHelper::createUrl('todo', 'create') ?>" method="POST">
        <div class="input-group mx-2">
            <input class="form-control " type="text" name="todo" placeholder="Dodaj listę rzeczy do wykonania"/>
            <button class="btn btn-primary me-4" type="submit">Dodaj</button>
        </div>
    </form>
</div>
