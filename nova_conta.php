<?php
include 'connect_db.php';

$nome = $_POST['novo_nome'];
$email = $_POST['novo_email'];
$senha = $_POST['nova_senha'];

$query = "SELECT email FROM usuarios WHERE email = '" . $email . "'";

$resultado = mysqli_query($conn, $query);
  
  if (mysqli_num_rows($resultado) === 0) {

    $query = "INSERT INTO usuarios (nome, email, senha) VALUES ('" . $nome . "','" . $email . "','" .  $senha . "')";

    $criar_conta = mysqli_query($conn, $query);

    if ($criar_conta === FALSE) {
        echo "Erro na criação : " . mysqli_error($conn);
      } else {
        // Consulta bem-sucedida, processe o resultado
        echo "Criação de conta executada com sucesso!";
        header("Location: index.php?nova_conta=sim");
      }
  } else{
    header("Location: signin.php?email_usado=sim");
    echo "Já existe uma conta com este email.";
  }
  
?>