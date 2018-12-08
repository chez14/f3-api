<?php
/*
    Umm, if you found this, then you're awesome 👍👍

    Please don't edit the following line, as it's
    the real system cycle runner and startup manager.

    best regards,
    Chez14
*/
array_map(function($data){require dirname(__DIR__) . "/" . $data;},[
    'vendor/autoload.php',
    'app/config.php',
    'app/app.php'
]);
$f3 = \F3::instance();
$f3->run();