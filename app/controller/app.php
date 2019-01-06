<?php
Namespace Controller;

class App extends \Prefab {
    public function get_hello($f3){
        throw new \Model\Error('Unathorized person', 'The required access level was not met.', 10, 'Bad token', 403);
    }

    public function get_ping($f3){
        return \View\Api::success([]);
    }
}