<?php
require_once 'helpers/database.php';

if (!isset($_GET['CurID'])) {
    echo json_encode(['status' => 'error', 'message' => 'CurID no fue proporcionado']);
    exit;
}

$CurID = $_GET['CurID'];

try {
    $pdo = getDatabaseConnection();
    $stmt = $pdo->prepare("
        SELECT E.EstuID, E.Nom, E.Apel, I.InsID
        FROM Estu E
        JOIN Inscrip I ON E.EstuID = I.EstuID
        JOIN Hora H ON I.HoraID = H.HoraID
        WHERE H.CurID = :CurID
    ");
    $stmt->bindParam(':CurID', $CurID, PDO::PARAM_INT);
    $stmt->execute();
    $estudiantes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(['status' => 'success', 'data' => $estudiantes]);
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
?>
