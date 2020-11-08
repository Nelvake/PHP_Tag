<?php

namespace ItStep\PHP;

use ItStep\PHP\Abilities\BootTraits;
use ItStep\PHP\Abilities\HasAttributes;
use ItStep\PHP\Abilities\HasBody;
use ItStep\PHP\Abilities\HasName;


abstract class BaseTag {
    use HasName, HasAttributes, HasBody, BootTraits;

    public function __construct(string $name) {
        $this->name = $name;
        $this->bootTraits();
    }

    function appendTo(BaseTag $tag) {
        $tag->appendBody($this);
        return $this;
    }

    function prependTo(BaseTag $tag) {
        $tag->appendBody($this);
        return $this;
    }

    function __toString() {
        return $this->toString();
    }

    function toString() {
        $tag = "<{$this->name()}{$this->attributes()}";

        if ($this->isSelfClosing())
            $tag .= '/>';
        else
            $tag .= ">{$this->body()}</{$this->name()}>";

        return $tag;
    }
}