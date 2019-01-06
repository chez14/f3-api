<?php
Namespace Controller;

class Index extends \Prefab {
    public function get_index($f3) {
        $f3->reroute('/app/ping.xml');
    }
}