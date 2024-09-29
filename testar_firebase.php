<?php

require __DIR__.'/vendor/autoload.php';
use Kreait\Firebase\Factory;
session_start();
$factory = (new Factory())->withDatabaseUri('https://neurodiario-d655b-default-rtdb.firebaseio.com/');

$database = $factory->createDatabase();

$usuarios = $database->getReference('usuarios')->getSnapshot();

$buscaContato = $database->getReference('usuarios/' . $_SESSION['id'])->getSnapshot()->getValue();

?>


<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Firebase</title>
</head>
<body>
    <?php 
    foreach($usuarios->getValue() as $index => $usuario){
        echo '<p> 
                Nome: ' . $usuario['nome'] . '
                Email:' . $usuario['email'] . '
                Senha: ' . $usuario['senha'] . '
                Avatar: ' . $usuario['avatar'] . '
                </p>' . $index;
    }
    echo '<strong>Encontrado:<br>Nome: ' . $_SESSION['id'] . '<br>Email: ' . $buscaContato['email']  . '</strong>';
    ?>
</body>
</html>