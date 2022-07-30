<?php

namespace View\Output;

class formatter extends \Prefab
{
    public function formatSuccess($data)
    {
        return [
            "status" => true,
            "data" => $data,
            "error" => null
        ];
    }

    public function formatError(\Model\Error $data)
    {
        return [
            "status" => false,
            "data" => null,
            "error" => $data->serveException()
        ];
    }
}
