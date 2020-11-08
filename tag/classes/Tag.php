<?php


namespace ItStep\PHP;


class Tag extends BaseTag
{
    static function __callStatic(string $name, array $arguments){
        return new static($name);
    }
}