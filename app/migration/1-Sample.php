<?php
namespace Migration;
/**
 * Migration Example
 * Please read more documentation on https://github.com/chez14/f3-ilgar
 */
class Sample extends \Chez14\Ilgar\MigrationPacket {
    public function on_migrate(){
        // Do your things here!
        // All the F3 object were loaded, F3 routines executed,
        // this will just like you doing things in your controller file.
        
        $f3 = \F3::instance(); //get the $f3 from here.
        
        echo "Hello from Test01 Migration package";
    }

    public function on_failed(\Exception $e) {

    }
}