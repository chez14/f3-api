<?php
namespace Output;

class formatter extends \Prefab{
    public function format_success($data){
        return [
            "status" => true,
            "data" => $data,
            "error" => false
        ];
    }

    public function format_error(\Model\ErrorModel $data){
        return [
            "status" => false,
            "data" => null,
            "error" => $data
        ];
    }
}