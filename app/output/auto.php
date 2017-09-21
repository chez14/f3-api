<?php
Namespace Output;
class Auto extends \Prefab {
    public function error($data){

    }

    public function success($data){
        
    }

    public function serve($data){
        $f3 = \F3::instance();
        if($f3->PARAMS['extention'] == 'json' || $f3->PARAMS['extention'] == ''){
            JSON::instance()->serve($data);
        } else {
            Plain::instance()->serve($data);
        }
    }
}