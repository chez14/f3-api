<?php
/*
    Umm, if you found this, then you're awesome 👍👍

    Please don't edit the following line, as it's
    the real system cycle runner and startup manager.

    best regards,
    Chez14
*/
array_map(function($data){require "../" . $data;},[
    'vendor/autoload.php',
    'app/config.php',
    'app/app.php'
]);
$f3 = \F3::instance();
if($f3->get("DEBUG") > 2)
    \Falsum\Run::handler();
$f3->run();