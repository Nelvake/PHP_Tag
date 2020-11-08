<?php


namespace ItStep\PHP\Abilities;


use ItStep\PHP\Tag\Name;

trait HasName {
    /** @var Name */
    protected $name;

    function isSelfClosing() {
        return $this->name()->isSelfClosing();
    }

    function name(): Name {
        return $this->name;
    }

    protected function bootHasName() {
        $this->name = new Name($this->name);
    }
}
