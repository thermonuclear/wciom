<?php

$trusted_hosts = [
    'trusted_hosts' => [
        'wciom.dev',
    ],
];

if (ENVIRONMENT != "") {
    if (file_exists(DOCROOT."application/config/".ENVIRONMENT."/url.php")) {
        include DOCROOT."application/config/".ENVIRONMENT."/url.php";
    }
}

return $trusted_hosts;
