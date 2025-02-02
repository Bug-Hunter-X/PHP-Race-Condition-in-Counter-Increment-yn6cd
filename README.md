# PHP Race Condition in Counter Increment

This repository demonstrates a race condition in a simple PHP counter increment function.  When multiple requests update the counter concurrently, the final value might be less than expected due to the lack of atomic operations or locking mechanisms. The solution demonstrates how to fix this using file locking.

## Bug

The `bug.php` file shows the problematic code. The `updateCounter` function increments a global counter. Without any synchronization, concurrent calls can lead to incorrect values.

## Solution

The `bugSolution.php` file provides a solution by using file locking to ensure that only one request can modify the counter at a time. This prevents race conditions and guarantees accurate updates even with multiple concurrent requests.