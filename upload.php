<?php
include 'connect_db.php';

$sql = "SELECT avatar FROM usuarios WHERE id=" . $_SESSION['id'];
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
        if(empty($file['tmp_name'])) { 
            header("Location: configuracoes.php");
        }
        // Verifica se o arquivo é realmente uma imagem
        $check = getimagesize($file['tmp_name']);
        
        if ($check !== false) {
            echo "O arquivo é uma imagem - " . $check['mime'] . ".";
            $uploadOk = 1;
        } else {
            echo "O arquivo não é uma imagem.";
            $uploadOk = 0;
        }

        // Verifica se o arquivo já existe
        if (file_exists($targetFile)) {
            echo "Desculpe, o arquivo já existe.";
            $uploadOk = 0;
        }

        // Verifica o tamanho do arquivo (opcional, exemplo: 1MB)
        if ($file['size'] > 1000000) {
            echo "Desculpe, o seu arquivo é muito grande.";
            $uploadOk = 0;
        }

        // Permite apenas certos formatos de arquivo (opcional)
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Desculpe, apenas arquivos JPG, JPEG, PNG e GIF são permitidos.";
            $uploadOk = 0;
        }

        // Verifica se `$uploadOk` está definido como 0 por algum erro
        if ($uploadOk == 0) {
            echo "Desculpe, o seu arquivo não foi enviado.";
        } else {
            if (file_exists($imagemAtual)) {
                unlink($imagemAtual);
            }
            $sql = "UPDATE usuarios SET avatar='$targetFile' WHERE id=" . $_SESSION['id'];
            $conn->query($sql) or die(''. $conn->error);
            // Se estiver tudo certo, tenta fazer o upload do arquivo
            if (move_uploaded_file($file['tmp_name'], $targetFile)) {
                $_SESSION['avatar'] = $targetFile;
                header("Location: perfil.php");
            } else {
                echo "Desculpe, ocorreu um erro ao enviar o seu arquivo.";
                header("Location: configuracoes.php");
            }
        }
    }
}
