<?php

namespace View;

class Api
{
    public static function error($data, $http_code = 400, $desc = null)
    {
        if (!($data instanceof \Model\Error)) {
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
        return self::serve(Output\Formatter::instance()->formatError($data));
    }

    public static function success($data)
    {
        return self::serve(Output\Formatter::instance()->formatSuccess($data));
    }

    protected static function serve($data)
    {
        Output\JSON::instance()->serve($data);
    }
}
