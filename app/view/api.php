<?php
namespace View;

class Api {
    public static function error($data, $http_code = 400, $desc = null){
        if(!($data instanceof \Model\Error)) {
            $data = new \Model\Error(
                $data, 
                $desc, 
                "HTTP" . $http_code,
                null,
                $http_code,
                null,
                null
            );
        }
        return self::serve(\Output\Formatter::instance()->format_error($data));
    }

    public static function success($data){
        return self::serve(\Output\Formatter::instance()->format_success($data));
    }

    protected static function serve($data){
        $f3 = \F3::instance();
        if(strtolower($f3->PARAMS['extension']) == 'json' || $f3->PARAMS['extension'] == ''){
            \Output\JSON::instance()->serve($data);
        } else if(strtolower($f3->PARAMS['extension']) == 'xml') {
            \Output\XML::instance()->serve($data);
        } else {
            \Output\Plain::instance()->serve($data);
        }
    }
}