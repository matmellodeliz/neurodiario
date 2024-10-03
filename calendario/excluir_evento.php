<?php
// session_start();

// require __DIR__ . '../../vendor/autoload.php';

// use Kreait\Firebase\Factory;

// $factory = (new Factory())->withDatabaseUri('https://neurodiario-d655b-default-rtdb.firebaseio.com/');
// $database = $factory->createDatabase();
// $eventos = $database->getReference('eventos/' . $_SESSION['id'])->getSnapshot();
// foreach ($eventos->getValue() as $index => $evento) {
//   if($evento['data_evento'] == $_POST['date'] && $evento['id_usuario'] == $_SESSION['id']){
//     $database->getReference('eventos/' . $_SESSION['id'] . '/' . $index)->remove();
//   }
// }
// // $novoEvento = [
// //   'id_usuario' => $_SESSION['id'],
// //   'data_evento' => $_POST['date'],
// //   'texto_evento' => $_POST['title']
// // ];
// // $database->getReference('eventos/' . $_SESSION['id'] . '/' . $proximoId)->set($novoEvento);



include '../connect_db.php';
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