<?php
array_map(function ($data) {
    require dirname(__DIR__) . "/" . $data;
}, [
    'vendor/autoload.php',
    'app/config.php',
    'app/app.php'
]);
$f3 = \F3::instance();
$f3->run();
