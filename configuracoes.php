<?php
include 'connect_db.php';
$erroEnvio = '';
if (isset($_GET['erroEnvio']) && $_GET['erroEnvio'] == 'y') {
    $erroEnvio = "<script>alert('Erro no envio. Você está mandando uma imagem? Se sim, cuidado com o tamanho.');</script>";
}
?>

<!doctype html>
<html>
<head>
    <title>Configurações</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/bf55efcdc5.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <?php echo $erroEnvio; ?>
</head>
<body style="background-color: #DDA0DD;">
    <div class="col-sm-6">
        <div class="card">
            <img src="<?= htmlspecialchars($_SESSION['avatar']) ?>" id="profilePreview" class="profile-img">
            <br>
            <div class="container">
                <div class="row" style="padding-bottom: 0px;">
                    <form id="uploadForm" action="upload.php" method="post" enctype="multipart/form-data">
                        <label class="button" for="profileImage">
                            <i class="fa-solid fa-id-badge fa-xl mr-4 col-sm-6" style="color: #525252; float:left; padding:10px 0 10px 8px"></i>
                            Trocar foto de perfil?
                        </label><br>
                        <input type="file" id="profileImage" name="profileImage" hidden accept="image/*"><br>
                        <button class="button" type="submit">
                            <i class="fa-solid fa-check fa-xl mr-4 col-sm-6" style="color: #525252; float:left; padding:10px 0 10px 8px"></i>
                            Salvar
                        </button>
                    </form>
                </div>
                <h4><i class="fa-solid fa-lock fa-sm mr-4 col-sm-6"></i> Trocar de senha?</h4>
                <?php if (isset($_GET['error'])): ?>
                    <div style="color:red;padding-bottom:10px">
                        <?php if ($_GET['error'] == 'nova_senha'): ?>
                            Senha deve ter ao menos 6 caracteres.
                        <?php elseif ($_GET['error'] == 'senha_atual'): ?>
                            Senha atual incorreta.
                        <?php endif; ?>
                    </div>
                <?php elseif (isset($_GET['sucess']) && $_GET['sucess'] == 'y'): ?>
                    <div style="color:green;padding-bottom:10px">
                        Senha trocada com sucesso.
                    </div>
                <?php endif; ?>
                <form method="post" action="nova_senha.php">
                    <div class="form-group">
                        <label for="senha_atual">Senha atual:</label>
                        <input style="border-radius: 5px;" type="password" id="senha_atual" name="senha_atual" class="form-control mb-3" placeholder="Senha atual" required><br><br>
                    </div>
                    <div class="form-group">
                        <label for="nova_senha">Nova senha:</label>
                        <input style="border-radius: 5px;" type="password" id="nova_senha" name="nova_senha" class="form-control form-control-sm" placeholder="Nova senha" required autofocus="" autocomplete="off">
                    </div><br>
                    <button class="button" type="submit">
                        <i class="fa-solid fa-check fa-xl mr-4 col-sm-6" style="color: #525252; float:left; padding:10px 0 10px 8px;"></i>
                        Salvar
                    </button>
                </form>
                <br>
                <a href="perfil.php" class="button">
                    <i class="fa-solid fa-arrow-left fa-xl mr-4 col-sm-6" style="color: #525252; float:left; padding:10px 0 10px 8px"></i>
                    Voltar
                </a>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('profileImage').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profilePreview').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>