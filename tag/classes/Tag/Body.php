<?php

namespace ItStep\PHP\Tag;

class Body
{
    protected $items;

    public function __construct()
    {
        $this->clear();
    }

    function clear(){
        $this->items = [];
        return $this;
    }


    function set(array $items){
        $this->items = $items;
        return $this;
    }

    function toArray(){
        return $this->items;
    }

    function prepend($value){
        $old = $this->toArray();
        array_unshift($old, $value);
        return $this->set($old);
    }

    function append($value){
        $old = $this->toArray();
        $old[] = $value;
        return $this->set($old);
    }

    function __toString()
    {
        return implode($this->toArray());
    }
}