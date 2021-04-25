<?php
$session_settings = [
    'database' => [
        'name' => 'session_id',
        'encrypted' => true,
        'lifetime' => Date::YEAR,
        'group' => 'default',
        'table' => 'sessions',
        'columns' => [
            'session_id' => 'session_id',
            'last_active' => 'last_active',
            'contents' => 'contents'
        ],
        'gc' => Date::MONTH,
    ],
];

return $session_settings;
