<?php

// Collection Interface
interface CollectionInterface {
    public function add($item);
    public function remove($item);
    public function contains($item);
    public function size();
    public function isEmpty();
    public function clear();
    public function toArray();
}

// List Interface
interface ListInterface extends CollectionInterface {
    public function get($index);
    public function set($index, $item);
    public function removeAt($index);
    public function indexOf($item);
}

// Queue Interface
interface QueueInterface extends CollectionInterface {
    public function enqueue($item);
    public function dequeue();
    public function peek();
}

// Map Interface
interface MapInterface {
    public function put($key, $value);
    public function get($key);
    public function remove($key);
    public function containsKey($key);
    public function containsValue($value);
    public function size();
    public function isEmpty();
    public function clear();
    public function keys();
    public function values();
}

// Iterator Interface
interface IteratorInterface {
    public function current();
    public function next();
    public function key();
    public function valid();
    public function rewind();
}


?>