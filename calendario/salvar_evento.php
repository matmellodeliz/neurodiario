<?php
include '../connect_db.php';

// Prepare the SQL statement
$query = $conn->prepare("INSERT INTO eventos (id_usuario, data_evento, texto_evento) VALUES (?, ?, ?)");
$query->bind_param("iss", $_SESSION['id'], $_POST['date'], $_POST['title']);

// Execute the statement
if ($query->execute()) {
    echo "Inserção executada com sucesso!";
} else {
    echo "Erro na inserção: " . $query->error;
}

// Close the statement
$query->close();
$conn->close();
?>
