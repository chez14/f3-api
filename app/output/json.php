<?php
namespace Output;

class JSON extends \Prefab {
    public function serve($data){
        $f3 = \F3::instance();
        echo json_encode($data, [
            JSON_PRETTY_PRINT => $f3->exists("GET.json_pretty_print")
        ]);
    }
}