<?php


namespace ItStep\PHP;

use Iterator;

interface QueueInterface extends Iterator
{
    function add($value);
    function pop();
}