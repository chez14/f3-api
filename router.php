<?php
// taken from https://www.sitepoint.com/taking-advantage-of-phps-built-in-server/
if (php_sapi_name() == "cli-server") {
    $extensions = array("json", "xml");
    $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    if (!in_array($ext, $extensions)) {
        return false;  
    }
    $_SERVER['SCRIPT_NAME']='index.php';
    include "public_html/index.php";
}