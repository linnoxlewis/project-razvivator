<?php

use App\Http\Models\Character;
use App\Http\Models\Course;
use App\Http\Models\Scope;
use App\Http\Models\Task;
use App\Http\Models\Users;
use App\Modules\admin\helpers\StatusHelper;
use App\Modules\admin\models\Params;

return [
    'users' => [
        'modelName' => Users::class,
        'orderBy' => [
            'id' => 'Идентификатор',
            'name' => 'Псевдоним',
            'email' => 'Email',
            'level' => 'Уровень',
            'created_at' => 'Дата создания'
        ],
        'viewAlias' => 'users',
        'selectFilter' => [
            'status' => StatusHelper::list()
        ],
        'upload' => [
            'field' => 'image',
            'path' => 'avatars'
        ]
    ],
    'scope' => [
        'modelName' => Scope::class,
        'orderBy' => [
            'id' => 'Идентификатор',
            'name' => 'Название',
        ],
        'viewAlias' => 'scope'
    ],
    'course' => [
        'modelName' => Course::class,
        'orderBy' => [
            'id' => 'Идентификатор',
            'name' => 'Название',
        ],
        'selectFilter' => [
            'status' => StatusHelper::list()
        ],
        'viewAlias' => 'course'
    ],
    'task' => [
        'modelName' => Task::class,
        'orderBy' => [
            'id' => 'Идентификатор',
            'name' => 'Название',
            'scope_id' => 'Сфера',
        ],
        'selectFilter' => [
            'status' => StatusHelper::list()
        ],
        'viewAlias' => 'task'
    ],
    'character' => [
        'modelName' => Character::class,
        'orderBy' => [
            'id' => 'Идентификатор',
            'name' => 'Название',
        ],
        'viewAlias' => 'character',
        'selectFilter' => [
            'status' => StatusHelper::list()
        ],
        'upload' => [
            'field' => 'image',
            'path' => 'character'
        ]
    ],
    'params' => [
        'modelName' => Params::class,
        'orderBy' => [
            'id' => 'Идентификатор',
            'name' => 'Название',
            'key' => 'Ключ',
        ],
        'viewAlias' => 'params',
    ],
];
