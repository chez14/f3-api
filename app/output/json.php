<?php
namespace Output;

class JSON extends \Prefab {
    public function serve($data){
        $f3 = \F3::instance();
        header('Content-type: application/json');
        echo json_encode($data, 
            ($f3->exists("GET.json_pretty_print")?JSON_PRETTY_PRINT:0)
        );
    }
}