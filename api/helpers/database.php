<?php
function getDatabaseConnection() {
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'capacitaciones';

    $connection = new mysqli($host, $user, $password, $database);

    if ($connection->connect_error) {
        die("Error de conexión: " . $connection->connect_error);
    }

    return $connection;
}
?>
