<?php

namespace ItStep\PHP;

abstract class BaseDoctype {
    public function __construct() {
        $this->doctype = "<!DOCTYPE";
    }

    function get($type) : string {
        return $this->doctype . $type . ">";
    }
}