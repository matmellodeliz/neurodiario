<?php
include '../connect_db.php';

$query = "SELECT data_evento as date, texto_evento as title FROM eventos WHERE id_usuario = " . $_SESSION['id'];
$resultado = mysqli_query($conn, $query);

$dados = [];
while ($linha = mysqli_fetch_assoc($resultado)) {
  $dados[] = $linha;
}

echo json_encode($dados);
?>