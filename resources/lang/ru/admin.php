<?php
return [
    'users' => [
        'statuses' => [
            \App\Models\User::LEVEL_USER => 'Пользователь',
            \App\Models\User::LEVEL_MODERATOR => 'Модератор',
            \App\Models\User::LEVEL_ADMIN => 'Админ',
        ],
    ],
];
