
<?php

global $connection;
$connection = mysqli_connect("172.21.0.1", "symfony", "symfony", "symfony", 3307);

if (!$connection) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    exit;
}
