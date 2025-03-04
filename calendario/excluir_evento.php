<?php
include '../connect_db.php';

if (isset($_POST['date']) && isset($_SESSION['id'])) {
    $data_evento = $_POST['date'];
    $id_usuario = $_SESSION['id'];

    $query = "DELETE FROM eventos WHERE id_usuario = ? AND data_evento = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'is', $id_usuario, $data_evento);

    if (mysqli_stmt_execute($stmt)) {
        echo "Remoção executada com sucesso!";
    } else {
        echo "Erro na remoção: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
} else {
    echo "Dados insuficientes para a remoção.";
}

mysqli_close($conn);
?>
