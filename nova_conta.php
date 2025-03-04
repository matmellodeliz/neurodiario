<?php
include 'connect_db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = trim($_POST['novo_nome']);
  $email = trim($_POST['email']);
  $senha = trim($_POST['nova_senha']);
  $hashed_senha = password_hash($senha, PASSWORD_DEFAULT);

  // Validações do lado do servidor
  if (strlen($nome) < 3) {
    $_SESSION['error'] = "O nome deve ter pelo menos 3 caracteres.";
    header("Location: signin.php?error=nome");
    exit();
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = "Por favor, insira um email válido.";
    header("Location: signin.php?error=email");
    exit();
  }

  if (strlen($senha) < 6) {
    $_SESSION['error'] = "A senha deve ter pelo menos 6 caracteres.";
    header("Location: signin.php?error=senha");
    exit();
  }

  if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
  }

  try {
    // Verifica se o email já existe
    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
      $_SESSION['error'] = "Email já registrado.";
      header("Location: signin.php?error=ja_registrado");
      exit();
    }

    // Inserir o novo usuário no banco de dados
    $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $email, $hashed_senha);

    if ($stmt->execute()) {
      $_SESSION['success'] = "Conta criada com sucesso.";
      header("Location: index.php?success=y");
    } else {
      $_SESSION['error'] = "Erro ao registrar. Tente novamente.";
      header("Location: signin.php");
      exit();
    }
  } finally {
    $stmt->close();
    $conn->close();
  }
}
?>
