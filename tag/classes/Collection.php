<?php


namespace ItStep\PHP;


use ArrayAccess;
use Countable;
use Iterator;
use JsonSerializable;

class Collection implements ArrayAccess, Iterator, Countable, JsonSerializable {

    protected $items;
    protected $position;

    public function __construct() {
        $this->items = [];
        $this->rewind();
    }

    public function rewind() {
        $this->position = 0;
    }

    public function offsetExists($offset): bool {
        return $this->has($offset);
    }

    function has($key) {
        return isset($this->items[$key]);
    }

    public function offsetGet($offset) {
        $this->get($offset);
    }

    public function get($key) {
        return $this->items[$key] ?? null;
    }

    public function offsetSet($offset, $value) {
        return $this->set($offset, $value);
    }

    function set($key, $value = null) {
        $this->items[$key] = $value;
    }

    public function offsetUnset($offset) {
        $this->delete($offset);
    }

    function delete($key) {
        unset($this->items[$key]);
    }

    public function current() {
        return $this->get($this->key());
    }

    public function key() {
        $keys = $this->keys();
        return $keys[$this->position];
    }

    function keys() {
        return array_keys($this->toArray());
    }

    function toArray() {
        return $this->items;
    }

    public function next() {
        $this->position++;
    }

    public function valid() {
        $keys = $this->keys();
        return isset($keys[$this->position]);
    }

    public function count() {
        return count($this->toArray());
    }

    public function jsonSerialize() {
        return $this->toArray();
    }
}