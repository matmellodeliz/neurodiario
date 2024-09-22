<?php
include 'connect_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = trim($_POST['novo_nome']);
  $email = trim($_POST['email']);
  $senha = trim($_POST['nova_senha']);

  // Validações do lado do servidor
  if (strlen($nome) < 3) {
    $_SESSION['error'] = "O nome de usuário deve ter pelo menos 3 caracteres.";
    header("Location: signin.php");
    exit();
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = "Por favor, insira um email válido.";
    header("Location: signin.php");
    exit();
  }

  if (strlen($senha) < 6) {
    $_SESSION['error'] = "A senha deve ter pelo menos 6 caracteres.";
    header("Location: signin.php");
    exit();
  }


  if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
  }

  // Verifica se o email já existe
  $stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows > 0) {
    $_SESSION['error'] = "Email já registrado.";
    header("Location: signin.php");
    exit();
  }

  // Inserir o novo usuário no banco de dados
  $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $nome, $email, $senha);

  if ($stmt->execute()) {
    header("Location: index.php?sucess=y");
  } else {
    $_SESSION['error'] = "Email já registrado.";
    header("Location: signin.php");
    exit();
  }

  $stmt->close();
  $conn->close();
}
