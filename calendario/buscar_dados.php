<?php
session_start();
require __DIR__ . '../../vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory())->withDatabaseUri('https://neurodiario-d655b-default-rtdb.firebaseio.com/');
$database = $factory->createDatabase();
$eventos = $database->getReference('eventos')->getSnapshot();
$dados = [];
foreach ($eventos->getValue() as $evento) {
  if($evento['id_usuario'] == $_SESSION['id']) $dados[] = $evento;
}

// $query = "SELECT data_evento as date, texto_evento as title FROM eventos WHERE id_usuario = " . $_SESSION['id'];
// $resultado = mysqli_query($conn, $query);

// $dados = [];
// while ($linha = mysqli_fetch_assoc($resultado)) {
//   $dados[] = $linha;
// }

echo json_encode($dados);
?>