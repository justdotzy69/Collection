<?php

require_once 'collection.php';

// ArrayList Implementation
class ArrayList implements ListInterface, IteratorInterface {
    private $items = [];
    private $position = 0;
    
    public function __construct(array $items = []) {
        $this->items = $items;
    }
    
    // CollectionInterface methods
    public function add($item) {
        $this->items[] = $item;
    }
    
    public function remove($item) {
        $index = $this->indexOf($item);
        if ($index !== -1) {
            return $this->removeAt($index);
        }
        return false;
    }
    
    public function contains($item) {
        return in_array($item, $this->items);
    }
    
    public function size() {
        return count($this->items);
    }
    
    public function isEmpty() {
        return empty($this->items);
    }
    
    public function clear() {
        $this->items = [];
    }
    
    public function toArray() {
        return $this->items;
    }
    
    // ListInterface methods
    public function get($index) {
        if (isset($this->items[$index])) {
            return $this->items[$index];
        }
        throw new OutOfBoundsException("Index $index out of bounds");
    }
    
    public function set($index, $item) {
        if (isset($this->items[$index])) {
            $this->items[$index] = $item;
        } else {
            throw new OutOfBoundsException("Index $index out of bounds");
        }
    }
    
    public function removeAt($index) {
        if (isset($this->items[$index])) {
            $removed = $this->items[$index];
            array_splice($this->items, $index, 1);
            return $removed;
        }
        throw new OutOfBoundsException("Index $index out of bounds");
    }
    
    public function indexOf($item) {
        $index = array_search($item, $this->items);
        return $index !== false ? $index : -1;
    }
    
    // IteratorInterface methods
    public function current() {
        return $this->items[$this->position];
    }
    
    public function next() {
        ++$this->position;
    }
    
    public function key() {
        return $this->position;
    }
    
    public function valid() {
        return isset($this->items[$this->position]);
    }
    
    public function rewind() {
        $this->position = 0;
    }
}

// LinkedList Implementation
class LinkedList implements ListInterface {
    private $first = null;
    private $last = null;
    private $size = 0;
    
    private class Node {
        public $data;
        public $next;
        
        public function __construct($data) {
            $this->data = $data;
            $this->next = null;
        }
    }
    
    public function add($item) {
        $newNode = new Node($item);
        
        if ($this->first === null) {
            $this->first = $newNode;
            $this->last = $newNode;
        } else {
            $this->last->next = $newNode;
            $this->last = $newNode;
        }
        
        $this->size++;
    }
    
    public function remove($item) {
        // Implementation for remove
    }
    
    public function contains($item) {
        $current = $this->first;
        while ($current !== null) {
            if ($current->data === $item) {
                return true;
            }
            $current = $current->next;
        }
        return false;
    }
    
    public function size() {
        return $this->size;
    }
    
    public function isEmpty() {
        return $this->first === null;
    }
    
    public function clear() {
        $this->first = null;
        $this->last = null;
        $this->size = 0;
    }
    
    public function toArray() {
        $result = [];
        $current = $this->first;
        while ($current !== null) {
            $result[] = $current->data;
            $current = $current->next;
        }
        return $result;
    }
    
    // Implement other ListInterface methods...
    public function get($index) {
        // Implementation for get
    }
    
    public function set($index, $item) {
        // Implementation for set
    }
    
    public function removeAt($index) {
        // Implementation for removeAt
    }
    
    public function indexOf($item) {
        // Implementation for indexOf
    }
}

// Stack Implementation
class Stack implements CollectionInterface {
    private $items = [];
    
    public function push($item) {
        $this->items[] = $item;
    }
    
    public function pop() {
        if ($this->isEmpty()) {
            throw new RuntimeException("Stack is empty");
        }
        return array_pop($this->items);
    }
    
    public function peek() {
        if ($this->isEmpty()) {
            throw new RuntimeException("Stack is empty");
        }
        return end($this->items);
    }
    
    // CollectionInterface methods
    public function add($item) {
        $this->push($item);
    }
    
    public function remove($item) {
        // For stack, typically we only remove from top
        // This implementation searches and removes specific item
        $index = array_search($item, $this->items);
        if ($index !== false) {
            array_splice($this->items, $index, 1);
            return true;
        }
        return false;
    }
    
    public function contains($item) {
        return in_array($item, $this->items);
    }
    
    public function size() {
        return count($this->items);
    }
    
    public function isEmpty() {
        return empty($this->items);
    }
    
    public function clear() {
        $this->items = [];
    }
    
    public function toArray() {
        return $this->items;
    }
}

// Queue Implementation
class ArrayQueue implements QueueInterface {
    private $items = [];
    
    public function enqueue($item) {
        $this->items[] = $item;
    }
    
    public function dequeue() {
        if ($this->isEmpty()) {
            throw new RuntimeException("Queue is empty");
        }
        return array_shift($this->items);
    }
    
    public function peek() {
        if ($this->isEmpty()) {
            throw new RuntimeException("Queue is empty");
        }
        return $this->items[0];
    }
    
    // CollectionInterface methods
    public function add($item) {
        $this->enqueue($item);
    }
    
    public function remove($item) {
        $index = array_search($item, $this->items);
        if ($index !== false) {
            array_splice($this->items, $index, 1);
            return true;
        }
        return false;
    }
    
    public function contains($item) {
        return in_array($item, $this->items);
    }
    
    public function size() {
        return count($this->items);
    }
    
    public function isEmpty() {
        return empty($this->items);
    }
    
    public function clear() {
        $this->items = [];
    }
    
    public function toArray() {
        return $this->items;
    }
}

// HashMap Implementation
class HashMap implements MapInterface {
    private $items = [];
    
    public function put($key, $value) {
        $this->items[$key] = $value;
    }
    
    public function get($key) {
        if ($this->containsKey($key)) {
            return $this->items[$key];
        }
        throw new InvalidArgumentException("Key $key not found");
    }
    
    public function remove($key) {
        if ($this->containsKey($key)) {
            $removed = $this->items[$key];
            unset($this->items[$key]);
            return $removed;
        }
        throw new InvalidArgumentException("Key $key not found");
    }
    
    public function containsKey($key) {
        return array_key_exists($key, $this->items);
    }
    
    public function containsValue($value) {
        return in_array($value, $this->items);
    }
    
    public function size() {
        return count($this->items);
    }
    
    public function isEmpty() {
        return empty($this->items);
    }
    
    public function clear() {
        $this->items = [];
    }
    
    public function keys() {
        return array_keys($this->items);
    }
    
    public function values() {
        return array_values($this->items);
    }
}
?>