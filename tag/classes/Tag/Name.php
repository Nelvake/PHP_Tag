<?php


namespace ItStep\PHP\Tag;

class Name
{
    protected $name;
    const selfClosing = ['area', 'base', 'br', 'col', 'embed', 'hr', 'img', 'input',
        'link', 'meta', 'param', 'source', 'track', 'wbr', 'command',
        'keygen', 'menuitem'
    ];

    public function __construct(string $name)
    {
        $this->set($name);
    }

    function set(string $name){
        $name = trim($name);
        $this->name = strtolower($name);
        return $this;
    }

    function get(){
        return $this->name;
    }

    function isSelfClosing(){
        return in_array($this->get(), self::selfClosing);
    }

    public function __toString()
    {
        return $this->get();
    }
}