<?php
include '../connect_db.php';
var_dump($_POST);
$data_evento = $_POST['date'];
$texto_evento = $_POST['title'];
$id_usuario = $_SESSION['id'];

$query = "INSERT INTO eventos (id_usuario, data_evento, texto_evento) VALUES (" . $id_usuario . ",'" . $data_evento . "','" .  $texto_evento . "')";

$resultado = mysqli_query($conn, $query);

if ($resultado === FALSE) {
    echo "Erro na inserção: " . mysqli_error($conn);
  } else {
    // Consulta bem-sucedida, processe o resultado
    echo "Inserção executada com sucesso!";
  }
?>