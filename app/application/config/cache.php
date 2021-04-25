<?php defined('SYSPATH') or die('No direct script access.');

$cache_settings = array
(
    'file'    => array(
        'driver'             => 'file',
        'cache_dir'          => APPPATH.'cache',
        'default_expire'     => 3600,
        'ignore_on_delete'   => array(
            '.gitignore',
            '.git',
            '.svn'
        )
    )
);

if (ENVIRONMENT != ""){
    if (file_exists(DOCROOT."application/config/".ENVIRONMENT."/cache.php")) {
        include DOCROOT."application/config/".ENVIRONMENT."/cache.php"; // настройки окружения
    }
}

return $cache_settings;
