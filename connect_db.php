<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "neurodiario");

if (!$conn) {
  header("Location: index.php");
  exit;
}

$sql = "INSERT INTO contador_paginas (nome_pagina, contador)
VALUES (?, 1)
ON DUPLICATE KEY UPDATE contador = contador + 1";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $_SERVER['PHP_SELF']);
mysqli_stmt_execute($stmt);

if (isset($_REQUEST['email']) && isset($_REQUEST['senha'])) {
  $email = $_REQUEST['email'];
  $senha = $_REQUEST['senha'];

  $sql = "SELECT * FROM usuarios WHERE email = ?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    $senha_hashed = $row['senha'];

    if (password_verify($senha, $senha_hashed)) {
      $_SESSION['id'] = $row['id'];
      $_SESSION['nome'] = $row['nome'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['avatar'] = $row['avatar'];

      header("Location: perfil.php");
      exit();
    } else {
      header("Location: index.php?error=y");
      exit();
    }
  } else {
    header("Location: index.php?error=y");
    exit();
  }
}

$allowed_pages = [
  '/neurodiario/nova_conta.php',
  '/neurodiario/signin.php',
  '/neurodiario/index.php',
  '/mateus/neurodiario/nova_conta.php',
  '/mateus/neurodiario/signin.php',
  '/mateus/neurodiario/index.php'
];

if (!isset($_SESSION['id']) && !in_array($_SERVER['PHP_SELF'], $allowed_pages)) {
  header('Location: index.php');
  exit();
}