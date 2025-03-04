<?php
include '../connect_db.php';

// Verifica se a sessão foi iniciada
if (!isset($_SESSION)) {
    session_start();
}

// Verifica se o id do usuário está definido na sessão
if (!isset($_SESSION['id'])) {
    echo json_encode(['error' => 'Usuário não autenticado']);
    exit;
}

// Prepara a consulta para evitar SQL Injection
$query = "SELECT data_evento as date, texto_evento as title FROM eventos WHERE id_usuario = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $_SESSION['id']);
$stmt->execute();
$resultado = $stmt->get_result();

$dados = [];
while ($linha = $resultado->fetch_assoc()) {
    $dados[] = $linha;
}

echo json_encode($dados);

// Fecha a conexão
$stmt->close();
$conn->close();
?>