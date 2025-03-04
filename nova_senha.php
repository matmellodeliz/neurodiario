<?php
include 'connect_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $senha_atual = $_POST['senha_atual'];
    $nova_senha = $_POST['nova_senha'];

    // Verifique se a nova senha tem pelo menos 6 caracteres
    if (strlen($nova_senha) < 6) {
        header('Location: configuracoes.php?error=nova_senha');
        exit();
    }

    // Obtenha a senha atual do banco de dados
    $user_id = $_SESSION['id'];
    $query = "SELECT senha FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die('Prepare failed: ' . $conn->error);
    }
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $stmt->bind_result($senha_hash);
    $stmt->fetch();
    $stmt->close();
    // Verifique se a senha atual está correta
    if (!password_verify($senha_atual, $senha_hash)) {
        header('Location: configuracoes.php?error=senha_atual');
        exit();
    }

    // Atualize a senha no banco de dados
    $nova_senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);
    $query = "UPDATE usuarios SET senha = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die('Prepare failed: ' . $conn->error);
    }
    $stmt->bind_param('si', $nova_senha_hash, $user_id);
    $stmt->execute();
    $stmt->close();

    header('Location: configuracoes.php?sucess=y');
    exit();
}
?>
