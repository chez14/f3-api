<?php
    //set on error
    \F3::instance()->set('ONERROR', function($f3) {
        if($f3->exists('EXCEPTION') && $f3->get('EXCEPTION') instanceof \Model\Error) {
            $excp = $f3->get('EXCEPTION');
            $f3->status($excp->get_http_status());
            return \View\Api::error($excp);
        }
        $error = new \Model\Error(
            $f3->get('ERROR.status'), 
            $f3->get('ERROR.text'), 
            "HTTP". $f3->get('ERROR.code'),
            null,
            $f3->get('ERROR.code'),
            null,
            $f3->get('EXCEPTION')
        );

        return \View\Api::error($error);
    });