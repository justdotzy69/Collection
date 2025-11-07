<?php
require_once 'array.php';
require_once 'collection_implementasi.php';

class CollectionDemo {
    
    public static function demonstrateCollections() {
        echo "=== COLLECTION DEMONSTRATION ===\n\n";
        
        // ArrayList Demo
        echo "1. ARRAYLIST DEMO:\n";
        $arrayList = new arrayList([1, 2, 3]);
        $arrayList->add(4);
        $arrayList->add(5);
        
        echo "Size: " . $arrayList->size() . "\n";
        echo "Contains 3: " . ($arrayList->contains(3) ? 'Yes' : 'No') . "\n";
        
        // Iterate using iterator
        echo "Items: ";
        $arrayList->rewind();
        while ($arrayList->valid()) {
            echo $arrayList->current() . " ";
            $arrayList->next();
        }
        echo "\n\n";
        
        // Stack Demo
        echo "2. STACK DEMO:\n";
        $stack = new Stack();
        $stack->push("First");
        $stack->push("Second");
        $stack->push("Third");
        
        echo "Peek: " . $stack->peek() . "\n";
        echo "Pop: " . $stack->pop() . "\n";
        echo "Size after pop: " . $stack->size() . "\n\n";
        
        // Queue Demo
        echo "3. QUEUE DEMO:\n";
        $queue = new ArrayQueue();
        $queue->enqueue("Customer 1");
        $queue->enqueue("Customer 2");
        $queue->enqueue("Customer 3");
        
        echo "Peek: " . $queue->peek() . "\n";
        echo "Dequeue: " . $queue->dequeue() . "\n";
        echo "Size after dequeue: " . $queue->size() . "\n\n";
        
        // HashMap Demo
        echo "4. HASHMAP DEMO:\n";
        $hashMap = new HashMap();
        $hashMap->put("name", "John Doe");
        $hashMap->put("age", 30);
        $hashMap->put("city", "Jakarta");
        
        echo "Name: " . $hashMap->get("name") . "\n";
        echo "Contains key 'age': " . ($hashMap->containsKey("age") ? 'Yes' : 'No') . "\n";
        echo "Keys: " . implode(", ", $hashMap->keys()) . "\n\n";
    }
    
    public static function compareArrayVsCollection() {
        echo "=== PERBANDINGAN ARRAY vs COLLECTION ===\n\n";
        
        // Contoh dengan array biasa
        $simpleArray = [1, 2, 3, 4, 5];
        echo "Array Biasa:\n";
        echo "Count: " . count($simpleArray) . "\n";
        echo "Contains 3: " . (in_array(3, $simpleArray) ? 'Yes' : 'No') . "\n";
        echo "Items: " . implode(", ", $simpleArray) . "\n\n";
        
        // Contoh dengan Collection
        $collection = new ArrayList([1, 2, 3, 4, 5]);
        echo "Collection (ArrayList):\n";
        echo "Size: " . $collection->size() . "\n";
        echo "Contains 3: " . ($collection->contains(3) ? 'Yes' : 'No') . "\n";
        echo "Items: " . implode(", ", $collection->toArray()) . "\n\n";
        
        echo "KELEBIHAN COLLECTION:\n";
        echo "- Type safety (bisa di-extend untuk tipe spesifik)\n";
        echo "- Method yang lebih ekspresif\n";
        echo "- Encapsulation yang lebih baik\n";
        echo "- Interface yang konsisten\n";
        echo "- Mudah di-extend dan dimodifikasi\n\n";
        
        echo "KELEBIHAN ARRAY:\n";
        echo "- Lebih cepat (native PHP)\n";
        echo "- Sintaks lebih sederhana\n";
        echo "- Tidak perlu instantiation object\n";
        echo "- Built-in functions yang powerful\n";
    }
}

// Menjalankan demo
CollectionDemo::demonstrateCollections();
CollectionDemo::compareArrayVsCollection();
?>