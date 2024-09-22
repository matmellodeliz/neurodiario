<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "neurodiario");
if (!$conn) {

  echo "Connection failed!";
}

if (isset($_REQUEST['email']) && isset($_REQUEST['senha'])) {
  $email = $_REQUEST['email'];
  $senha = $_REQUEST['senha'];
  $sql = "SELECT * FROM usuarios WHERE email='" . $email . "' AND senha='" . $senha . "'";

  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) === 1) {

    $row = mysqli_fetch_assoc($result);

    if ($row['email'] === $email && $row['senha'] === $senha) {
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
