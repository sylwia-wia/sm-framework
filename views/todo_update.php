<?php

use sm\models\Todo;
use sm\UrlHelper;

/** @var Todo $todo */
?>

<div class=" mx-4 my-4 ">
    <h1>Edycja</h1>

    <form method="POST">
        <div class="input-group mx-2">
            <input class="form-control " type="text" name="name" value="<?= $todo->name ?> "/>
            <button class="btn btn-primary me-4" type="submit">Zapisz</button>
        </div>
    </form>
</div>
