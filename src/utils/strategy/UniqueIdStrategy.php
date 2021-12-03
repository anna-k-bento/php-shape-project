<?php
include_once 'IStrategy.php';
class UniqueIdStrategy implements IStrategy
{
    public function generateId(object $obj): string
    {
        return uniqid();
    }
}