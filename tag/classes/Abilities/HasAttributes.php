<?php


namespace ItStep\PHP\Abilities;


use ItStep\PHP\Tag\Attributes;

trait HasAttributes
{
    /** @var Attributes */
    protected $attributes;

    protected function bootHasAttributes() {
        $this->attributes = new Attributes();
    }

    function attributes():Attributes{
        return $this->attributes;
    }

    function setAttr(string $key, $value){
        $this->attributes()->set($key, $value);
        return $this;
    }

    function prependAttr(string $key, $value){
        $this->attributes()->prepend($key, $value);
        return $this;
    }

    function addClass($class){
        $this->attributes()->addClass($class);
        return $this;
    }

    function appendAttr(string $key, $value){
        $this->attributes()->append($key, $value);
        return $this;
    }

    function __call(string $name, array $arguments){
        if($name == 'class')
            return $this->addClass(... $arguments);
        return $this->setAttr($name, ... $arguments);
    }

    function __set($name, $value){
        if($name == 'class')
            return $this->addClass($value);
        return $this->setAttr($name, $value);
    }

}