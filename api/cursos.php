<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');

require_once '../helpers/database.php';

$connection = getDatabaseConnection();
$query = "SELECT * FROM cursos";
$result = $connection->query($query);

$cursos = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cursos[] = $row;
    }
}

echo json_encode($cursos);
?>
