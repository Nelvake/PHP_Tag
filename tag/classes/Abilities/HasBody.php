<?php


namespace ItStep\PHP\Abilities;


use ItStep\PHP\Tag\Body;

trait HasBody
{
    protected $body;

    protected function bootHasBody(){
        $this->body = new Body();

    }

    function body(): Body{
        return $this->body;
    }

    function appendBody($value){
        $this->body()->append($value);
        return $this;
    }

    function prependBody($value){
        $this->body()->prepend($value);
        return $this;
    }
}