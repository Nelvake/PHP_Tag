<?php


namespace ItStep\PHP;


class Queue implements QueueInterface
{
    protected $items;
    protected $position;

    public function get($key)
    {
        return $this->items[$key] ?? null;
    }

    function toArray()
    {
        return $this->items;
    }

    function keys()
    {
        return array_keys($this->toArray());
    }

    public function current()
    {
        return $this->pop();
    }

    public function next()
    {
        $this->position++;
    }

    public function key()
    {
        $keys = $this->keys();
        return $keys[$this->position];
    }

    public function valid()
    {
        $keys = $this->keys();
        return isset($keys[$this->position]);
    }

    public function rewind()
    {
        $this->position = 0;
    }


    function add($value)
    {
        $this->items[] = $value;
    }

    function pop()
    {
        return array_shift($this->items);
    }
}