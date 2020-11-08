<?php


namespace ItStep\PHP\Abilities;


use ReflectionClass;

trait BootTraits {
    protected function bootTraits() {
        $reflection = new ReflectionClass($this);
        $traits = $reflection->getTraits();

        while ($reflection = $reflection->getParentClass()) {
            $traits += $reflection->getTraits();
        }

        foreach ($traits as $trait) {
            $method = "boot" . $trait->getShortName();

            if (!method_exists($this, $method)) {
                continue;
            }

            $this->{$method}();
        }
    }
}