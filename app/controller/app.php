<?php
Namespace Controller;

class App {
    public function get_hello($f3){
        throw new \Model\Error('Unathorized person', 'The required access level was not met.', 10, 'Bad token', 403);
    }
}