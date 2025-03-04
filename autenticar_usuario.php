<?php
session_start();
include 'connect_db.php';

if (isset($_POST['email']) && isset($_POST['senha'])) {
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $senha = $_POST['senha'];

  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);

      if (password_verify($senha, $row['senha'])) {
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
  } else {
    header("Location: index.php?error=invalid_email");
    exit();
  }
} else {
  header("Location: index.php?error=missing_data");
  exit();
}
?>
