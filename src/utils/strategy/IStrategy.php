<?php
interface IStrategy
{
    public function generateId(object $obj): string;
}