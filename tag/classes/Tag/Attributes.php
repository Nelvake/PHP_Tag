<?php

namespace ItStep\PHP\Tag;

class Attributes {
    protected $attributes;
    protected $classes;

    public function __construct() {
        $this->clear();
    }

    function clear() {
        $this->classes = [];
        return $this->setArray([]);
    }

    function setArray(array $attributes) {
        $this->attributes = $attributes;
        return $this;
    }

    function prepend(string $key, $value) {
        $old = $this->get($key);
        $value = $value . $old;
        return $this->set($key, $value);
    }

    function get(string $key) {
        return $this->toArray()[$key] ?? null;
    }

    function toArray() {
        return array_filter($this->attributes, function ($attribute)
        {
            return !is_null($attribute);
        });
    }

    function set(string $key, $value) {
        $old = $this->toArray();
        $key = strtolower($key);
        $key = trim($key);
        $old[$key] = $value;
        return $this->setArray($old);
    }

    function append(string $key, $value) {
        $old = $this->get($key);
        $value = $old . $value;
        return $this->set($key, $value);
    }

    function addClass($class) {
        $class = $this->clearClass($class);
        if (!$this->isClassExists($class))
            $this->classes[] = $class;
        return $this;
    }

    protected function clearClass($class) {
        $class = strtolower($class);
        return preg_replace('/\W+/', '', $class);
    }

    protected function isClassExists($class) {
        return in_array($class, $this->classes);
    }

    function __toString() {
        $attributes = '';
        foreach ($this->toArray() as $key => $value) {
            $attributes .= " {$key}=\"{$value}\"";
        }
        $attributes .= $this->toStringClasses();

        return $attributes;
    }

    protected function toStringClasses() {
        if (empty($this->classes))
            return "";

        $classes = " class=\"";
        foreach ($this->classes as $value) {
            $classes .= "{$value} ";
        }
        return substr_replace($classes, "\"", -1);
    }
}