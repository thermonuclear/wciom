<?php
defined('SYSPATH') or die('No direct access allowed.');

return [
    'default' => [
        'type' => 'MySQLi',
        'connection' => [
            'hostname' => $_SERVER['DB_HOST'] ?? 'localhost',
            'username' => 'root',
            'password' => 'root',
            'database' => 'wciom',
            'persistent' => true,
        ],
        'table_prefix' => '',
        'charset' => 'utf8',
        'caching' => false,
    ],
];
