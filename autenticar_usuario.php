<?php

require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory())->withDatabaseUri('https://neurodiario-d655b-default-rtdb.firebaseio.com/');
$database = $factory->createDatabase();
$usuarios = $database->getReference('usuarios')->getSnapshot();
foreach ($usuarios->getValue() as $index => $usuario) {
  if ($_POST['email'] == $usuario['email']) {
    session_start();
    $_SESSION['id'] = $index;
    $_SESSION['nome'] = $usuario['nome'];
    $_SESSION['email'] = $usuario['email'];
    $_SESSION['senha'] = $usuario['senha'];
    $_SESSION['avatar'] = $usuario['avatar'];
    header('Location: perfil.php');
    exit();
  }
}

header('Location: index.php?email=error');
exit();





// session_start();

// $conn = mysqli_connect("localhost", "root", "", "neurodiario");
// if (!$conn) {

//   echo "Falha de conexão!";
// }

// if (isset($_REQUEST['email']) && isset($_REQUEST['senha'])) {
//   $email = $_REQUEST['email'];
//   $senha = $_REQUEST['senha'];
//   $sql = "SELECT * FROM usuarios WHERE email='" . $email . "' AND senha='" . $senha . "'";

//   $result = mysqli_query($conn, $sql);
  
//   if (mysqli_num_rows($result) === 1) {

//     $row = mysqli_fetch_assoc($result);

//     if ($row['email'] === $email && $row['senha'] === $senha) {
//       $_SESSION['id'] = $row['id'];
//       $_SESSION['nome'] = $row['nome'];
//       $_SESSION['email'] = $row['email'];
//       $_SESSION['senha'] = $row['senha'];
//       $_SESSION['avatar'] = $row['avatar'];

//       header("Location: perfil.php");
//       exit();
//     } else {
//       header("Location: index.php?error=y");
//       exit();
//     }
//   } else {
//     header("Location: index.php?error=y");
//     exit();
//   }
// }
