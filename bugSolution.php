```php
<?php

$counterFile = 'counter.txt';

function updateCounter() {
    global $counterFile;
    // Acquire an exclusive lock on the counter file
    $fp = fopen($counterFile, 'c+');
    if (flock($fp, LOCK_EX)) {
        // Read the current counter value
        $counter = (int)fgets($fp);
        // Increment the counter
        $counter++;
        // Write the updated counter value back to the file
        ftruncate($fp, 0); // Clear the file content
        rewind($fp);
        fwrite($fp, $counter);
        // Release the lock
        flock($fp, LOCK_UN);
    }
    fclose($fp);
}

// Simulate multiple concurrent requests
for ($i = 0; $i < 10; $i++) {
    updateCounter();
}

//Read the final counter value from the file
$fp = fopen($counterFile, 'r');
echo "Counter value: " . (int)fgets($fp);
fclose($fp);

?>
```