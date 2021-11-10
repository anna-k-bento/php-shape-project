<?php
/**
 * Singleton watcher to control generated id's and other properties
 */
class ObjectWatcher{

    private static $instance;

    private function __construct(){

    }

    static public function instance() {
        if(!self::$instance){
            self::$instance = new ObjectWatcher();
        }
        return self::$instance;
    }

    static public function add(Shape $obj) {
        $inst = self::instance();
        $inst->all[$obj->getId()] = $obj;
    }

    static public function exists(string $id){
        $inst = self::instance();
        return array_key_exists($id,$inst->all);
    }
}
