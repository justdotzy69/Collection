<?php
class ArrayExamples {
    
    // Array List
    public static function arrayListExample() {
        echo "=== ARRAY LIST EXAMPLE ===\n";
        $arrayList = [1, 2, 3, 4, 5];
        
        $arrayList[] = 6;
        array_push($arrayList, 7);
        
        unset($arrayList[2]); // Hapus elemen index 2
        
        echo "Elemen index 0: " . $arrayList[0] . "\n";
        
        print_r($arrayList);
        echo "\n";
    }
    
    // Linked List 
    public static function linkedListExample() {
        echo "=== LINKED LIST EXAMPLE ===\n";
        $linkedList = [];
        
        array_unshift($linkedList, "first");
        
        array_push($linkedList, "last");
        
        array_splice($linkedList, 1, 0, "middle");
        
        array_shift($linkedList);
        
        array_pop($linkedList);
        
        print_r($linkedList);
        echo "\n";
    }
    
    // Stack (LIFO)
    public static function stackExample() {
        echo "=== STACK EXAMPLE ===\n";
        $stack = [];
        
        array_push($stack, "item1");
        array_push($stack, "item2");
        array_push($stack, "item3");
        
        $popped = array_pop($stack);
        echo "Popped: " . $popped . "\n";
        
        $peek = end($stack);
        echo "Peek: " . $peek . "\n";
        
        print_r($stack);
        echo "\n";
    }
    
    // Queue (FIFO)
    public static function queueExample() {
        echo "=== QUEUE EXAMPLE ===\n";
        $queue = [];
        
        array_push($queue, "customer1");
        array_push($queue, "customer2");
        array_push($queue, "customer3");
        
        $dequeued = array_shift($queue);
        echo "Dequeued: " . $dequeued . "\n";
        
        $peek = reset($queue);
        echo "Peek: " . $peek . "\n";
        
        print_r($queue);
        echo "\n";
    }
    
    // Hash Map 
    public static function hashMapExample() {
        echo "=== HASH MAP EXAMPLE ===\n";
        $hashMap = [
            "name" => "John",
            "age" => 30,
            "city" => "Jakarta"
        ];
        
        $hashMap["country"] = "Indonesia";
        
        echo "Name: " . $hashMap["name"] . "\n";
        
        unset($hashMap["age"]);
        
        if (array_key_exists("city", $hashMap)) {
            echo "City exists: " . $hashMap["city"] . "\n";
        }
        
        print_r($hashMap);
        echo "\n";
    }
}


ArrayExamples::arrayListExample();
ArrayExamples::linkedListExample();
ArrayExamples::stackExample();
ArrayExamples::queueExample();
ArrayExamples::hashMapExample();
?>