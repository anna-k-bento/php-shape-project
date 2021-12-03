<?php
include_once 'strategy/IStrategy.php';
include_once 'strategy/SplObjectStrategy.php';
include_once 'strategy/UniqueIdStrategy.php';
include_once __DIR__ . '/../enum/StrategyConstants.php';
/**
 * Singleton watcher to control generated id's and other properties
 */
class ObjectWatcher{

    private static $instance;

    private function __construct(){

    }

    /**
     * Get instance and if not exists create
     */
    static public function instance() {
        if(!self::$instance){
            self::$instance = new ObjectWatcher();
        }
        return self::$instance;
    }

    /**
     * Everytime new object of Shape family is added, save generated id
     * @param $obj Shape
     */
    static public function add(Shape $obj) {
        $inst = self::instance();
        $inst->all[$obj->getId()] = $obj;
    }

    /**
     * Verify if given id belongs to one of the previously created objects
     * @param $id - id to confirm
     * @return boolean
     */
    static public function exists(string $id){
        $inst = self::instance();
        return array_key_exists($id,$inst->all);
    }

    /**
     * Set new strategy for id generation
     * @param $type type of strategy, please see StrategyConstants
     */
    static public function changeStrategy(string $type){
        $inst = self::instance();
        switch($type){
            case StrategyConstants::UNIQUE:
                $inst->strategy = new UniqueIdStrategy();
                break;
            default: 
                $inst->strategy = new SplObjectStrategy();  
        }
    }

    /**
     * Get currently used strategy for id generation
     * @return IStrategy
     */
    static public function getStrategy() : IStrategy{
        $inst = self::instance();
        if(!isset($inst->strategy)){
            return new SplObjectStrategy();
        }
        return $inst->strategy ;
    }
    
}
