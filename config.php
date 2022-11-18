<?php

return [
    'routes' => [
        'todo/create' => [
            'class' => \sm\controllers\TodoController::class,
            'method' => 'create'
        ],
        'todo/update' => [
            'class' => \sm\controllers\TodoController::class,
            'method' => 'update'
        ],
        'todo/index' => [
            'class' => \sm\controllers\TodoController::class,
            'method' => 'index'
        ],
        'todo/delete' => [
            'class' => \sm\controllers\TodoController::class,
            'method' => 'delete'
        ],
        'todo/search' => [
            'class' => \sm\controllers\TodoController::class,
            'method' => 'search'
        ],
        'todo/edit' => [
            'class' => \sm\controllers\TodoController::class,
            'method' => 'edit'
        ],
    ],
];