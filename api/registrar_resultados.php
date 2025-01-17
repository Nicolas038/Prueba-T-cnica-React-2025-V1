<?php
require_once 'helpers/database.php';

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['resultados']) || empty($data['resultados'])) {
    echo json_encode(['status' => 'error', 'message' => 'No se han proporcionado resultados']);
    exit;
}

$resultados = $data['resultados'];

try {
    $pdo = getDatabaseConnection();
    $pdo->beginTransaction();

    $stmt = $pdo->prepare("
        INSERT INTO Calif (InsID, Nota, Apro, Comentario)
        VALUES (:InsID, :Nota, :Apro, :Comentario)
    ");

    foreach ($resultados as $resultado) {
        $stmt->execute([
            ':InsID' => $resultado['InsID'],
            ':Nota' => $resultado['nota'],
            ':Apro' => $resultado['apro'],
            ':Comentario' => $resultado['comentario']
        ]);
    }

    $pdo->commit();
    echo json_encode(['status' => 'success', 'message' => 'Resultados registrados correctamente']);
} catch (Exception $e) {
    $pdo->rollBack();
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
?>
