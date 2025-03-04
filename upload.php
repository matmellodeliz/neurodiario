<?php
session_start();
include 'connect_db.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$id = intval($_SESSION['id']);
$sql = "SELECT avatar FROM usuarios WHERE id=$id";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $imagemAtual = $row['avatar'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profileImage'])) {
        $targetDirectory = "uploads/"; // Diretório onde o arquivo será salvo
        $file = $_FILES['profileImage'];
        $fileName = basename($file['name']);
        $targetFile = $targetDirectory . time() . '_' . $fileName; // Adiciona timestamp ao nome do arquivo para evitar duplicidade
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        
        if (empty($file['tmp_name'])) { 
            header("Location: configuracoes.php");
            exit();
        }

        // Verifica se o arquivo é realmente uma imagem
        $check = getimagesize($file['tmp_name']);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }

        // Verifica se o arquivo já existe
        if (file_exists($targetFile)) {
            $uploadOk = 0;
        }

        // Verifica o tamanho do arquivo (opcional, exemplo: 1MB)
        if ($file['size'] > 1000000) {
            $uploadOk = 0;
        }

        // Permite apenas certos formatos de arquivo (opcional)
        $allowedFileTypes = ['jpg', 'png', 'jpeg', 'gif'];
        if (!in_array($imageFileType, $allowedFileTypes)) {
            $uploadOk = 0;
        }

        // Verifica se `$uploadOk` está definido como 0 por algum erro
        if ($uploadOk == 0) {
            header("Location: configuracoes.php?erroEnvio=y");
            exit();
        } else {
            if (file_exists($imagemAtual)) {
                unlink($imagemAtual);
            }
            $sql = "UPDATE usuarios SET avatar='$targetFile' WHERE id=$id";
            if ($conn->query($sql) === TRUE) {
                // Se estiver tudo certo, tenta fazer o upload do arquivo
                if (move_uploaded_file($file['tmp_name'], $targetFile)) {
                    $_SESSION['avatar'] = $targetFile;
                    header("Location: perfil.php");
                    exit();
                } else {
                    echo "Desculpe, ocorreu um erro ao enviar o seu arquivo.";
                    header("Location: configuracoes.php");
                    exit();
                }
            } else {
                echo "Erro ao atualizar o avatar: " . $conn->error;
            }
        }
    }
} else {
    echo "Usuário não encontrado.";
}
?>
