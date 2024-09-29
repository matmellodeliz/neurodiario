<?php
session_start();
var_dump($_POST);
$data_evento = $_POST['date'];
$id_usuario = $_SESSION['id'];

$query = "DELETE FROM eventos WHERE id_usuario = " . $id_usuario . " AND data_evento = '" . $data_evento . "'";

$resultado = mysqli_query($conn, $query);

if ($resultado === FALSE) {
    echo "Erro na remoção: " . mysqli_error($conn);
  } else {
    // Consulta bem-sucedida, processe o resultado
    echo "Remoção executada com sucesso!";
  }
?>