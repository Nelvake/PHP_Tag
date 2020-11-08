<?php

namespace ItStep\PHP;

class Doctype extends BaseDoctype{
    static function __callStatic(string $name, array $arguments){
        return new static($name);
    }
}