<?php
include_once 'IStrategy.php';
class SplObjectStrategy implements IStrategy
{
    public function generateId(object $obj): string
    {
        return spl_object_hash($obj);
    }
}