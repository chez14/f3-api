<?php
namespace Output;

class Plain extends \Prefab {
    public function serve($data){
        $f3 = \F3::instance();
        header('Content-type: text/plain');
        echo "Unsupported API Result type. Please use defined result type, or contact administrator.";
    }
}