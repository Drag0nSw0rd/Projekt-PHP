<?php
function db(): PDO
{
    static $pdo;

    if (!$pdo) {
        return new PDO(
            sprintf("mysql:host=%s;dbname=%s;charset=UTF8", DB_HOST, DB_NAME),
            DB_USER,
            DB_PASSWORD,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }
    return $pdo;
}
/* In the db() function, the $pdo is a static variable. 
When you call the db() function for the first time, the $pdo variable is not initialized. 
Therefore, the code block inside the if statement executes that connects to the database and returns a new PDO object.
Since the $pdo is a static variable, it’s still alive after the function db() function completes. 
Therefore, when you call the db() function again, it returns the PDO object. 
In other words, the function doesn’t connect to the database again.*/
?>