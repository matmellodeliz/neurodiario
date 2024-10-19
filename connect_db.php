<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "neurodiario");

if (!$conn) {
  header("Location: index.php");
  exit;
}


if (isset($_REQUEST['email']) && isset($_REQUEST['senha'])) {
  $email = mysqli_real_escape_string($conn,$_REQUEST['email']);
  $senha = mysqli_real_escape_string($conn,$_REQUEST['senha']);
  $sql = "SELECT * FROM usuarios WHERE email='" . $email . "'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    $senha_hashed = $row['senha'];

    if ($row['email'] === $email && password_verify($senha, $senha_hashed)) {
      $_SESSION['id'] = $row['id'];
      $_SESSION['nome'] = $row['nome'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['senha'] = $row['senha'];
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
if (!isset($_SESSION['id']) && !in_array($_SERVER['PHP_SELF'], ['/neurodiario/nova_conta.php', '/neurodiario/signin.php', '/mateus/neurodiario/nova_conta.php', '/mateus/neurodiario/signin.php'])) {
  header('Location: index.php');
  exit();
}