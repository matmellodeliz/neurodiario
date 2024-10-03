<?php
// session_start();
// require __DIR__ . '../../vendor/autoload.php';

// use Kreait\Firebase\Factory;

// try {
//   $factory = (new Factory())->withDatabaseUri('https://neurodiario-d655b-default-rtdb.firebaseio.com/');
//   $database = $factory->createDatabase();
//   $eventos = $database->getReference('eventos/' . $_SESSION['id'])->getSnapshot();
//   $dados = [];
//   foreach ($eventos->getValue() as $index => $evento) {
//     if($evento != null){
//       $dados[] = [
//         'date' => $evento['data_evento'], // data formato mes/dia/ano
//         'title' => $evento['texto_evento']
//       ];
//     }
    
//   }

  include '../connect_db.php';
  $query = "SELECT data_evento as date, texto_evento as title FROM eventos WHERE id_usuario = " . $_SESSION['id'];
  $resultado = mysqli_query($conn, $query);

  $dados = [];
  while ($linha = mysqli_fetch_assoc($resultado)) {
    $dados[] = $linha;
  }
  echo json_encode($dados);


// } catch (Exception $e) {
  // Tratar exceção, por exemplo, retornar uma mensagem de erro em JSON
  // echo json_encode(['error' => $e->getMessage()]);
// }
