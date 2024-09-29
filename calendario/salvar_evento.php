<?php
session_start();

require __DIR__ . '../../vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory())->withDatabaseUri('https://neurodiario-d655b-default-rtdb.firebaseio.com/');
$database = $factory->createDatabase();
$eventos = $database->getReference('eventos/' . $_SESSION['id'])->getSnapshot();
$proximoId = 0;
foreach ($eventos->getValue() as $index => $evento) {
    $proximoId = intval($index) + 1;
}
$novoEvento = [
  'data_evento' => $_POST['date'],
  'texto_evento' => $_POST['title']
];
$database->getReference('eventos/' . $_SESSION['id'] . '/' . $proximoId)->set($novoEvento);



// $query = "INSERT INTO eventos (id_usuario, data_evento, texto_evento) VALUES (" . $id_usuario . ",'" . $data_evento . "','" .  $texto_evento . "')";

// $resultado = mysqli_query($conn, $query);

// if ($resultado === FALSE) {
//     echo "Erro na inserção: " . mysqli_error($conn);
//   } else {
//     // Consulta bem-sucedida, processe o resultado
//     echo "Inserção executada com sucesso!";
//   }
