<?php
include 'connect_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $senha_atual = trim($_POST['senha_atual']);
    $nova_senha = trim($_POST['nova_senha']);
    $hashed_nova_senha = password_hash($nova_senha, PASSWORD_DEFAULT);

    // Validações do lado do servidor
    if (strlen($nova_senha) < 6) {
        header("Location: configuracoes.php?error=nova_senha");
        exit();
    }

    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    // Verifica se a senha atual está correta
    $sql = "SELECT senha FROM usuarios WHERE id='" . $_SESSION['id'] . "'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $senha_hashed = $row['senha'];

        if (password_verify($senha, $senha_hashed)) {
            $_SESSION['error'] = "Senha atual incorreta.";
            header("Location: configuracoes.php?error=senha_atual");
            exit();
        }
    }
    // Inserir o novo usuário no banco de dados
    $stmt = $conn->prepare("UPDATE usuarios SET senha = ? WHERE id = ?");
    $stmt->bind_param("ss", $hashed_nova_senha, $_SESSION['id']);

    if ($stmt->execute()) {
        header("Location: configuracoes.php?sucess=y");
    } else {
        $_SESSION['error'] = "Falha na troca de senha.";
        header("Location: configuracoes.php");
        exit();
    }

    $stmt->close();
    $conn->close();
}
